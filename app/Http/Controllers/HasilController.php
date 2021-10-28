<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Siswa;
use App\AppModel\Aspek;
use App\AppModel\Faktor;
use App\AppModel\Nilai;
use App\AppModel\Gap;
use App\AppModel\Manager;
use DB;
use App\Http\Requests;
use App\Http\Requests\Hasil\StoreRequest;
use App\Http\Requests\Hasil\UpdateRequest;
use Excel;

class HasilController extends Controller
{
        /**
         * Create a new controller instance.
         *
         * @return void
         */
    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function index()
    {

        /**
        * For to Display a Eloquent into Query.
        *
        * $result = Nilai::select(DB::raw('students.nama as nama, aspeks.aspek AS aspek, faktors.faktor AS faktor,faktors.nilai_ideal AS nilai_ideal,nilais.nilai AS nilai, (nilais.nilai - faktors.nilai_ideal) AS hasil'))
             -> join('aspeks', 'nilais.id_aspeks', '=', 'aspeks.id_aspek')
             -> join('faktors', 'nilais.id_faktor', '=', 'faktors.id_faktor') //Because eloquent doesn't support using operator "USING" from query 
             -> join('students', 'nilais.nis', '=', 'students.nis') //Because eloquent doesn't support using operator "USING" from query 
             -> get();
        */
        // $skala      = 'SELECT 
        //                   b.nama,
        //                   c.aspek,
        //                   d.faktor,
        //                   e.skala 
        //                 FROM 
        //                   nilais a
        //                   JOIN students b USING(nis)
        //                   JOIN faktors d USING(id_faktor)
        //                   JOIN aspeks c USING(id_aspek)
        //                   JOIN skalas e ON e.id_skala=a.nilai
        //                 ORDER BY b.nama,c.aspek
        //                 ';
        $periode = date('Y');
        $skala = 'SELECT 
                           b.nama,
                           c.aspek,
                           d.faktor
                           
                         FROM 
                           nilais a
                           JOIN students b USING(nis)
                           JOIN faktors d USING(id_faktor)
                           JOIN aspeks c USING(id_aspek) WHERE b.periode like "%'.$periode.'%"
                         ORDER BY b.nama,c.aspek
                         ';
        $query    = 'SELECT 
                    nama, 
                    aspek, 
                    faktor, 
                    nilai_ideal, 
                    nilai, 
                    bobot, 
                    kelompok, 
                    (nilai-nilai_ideal) as hasil
                  FROM nilais
                    JOIN students USING (nis)
                    JOIN faktors USING (id_faktor)
                    JOIN aspeks USING (id_aspek)
                    JOIN gaps ON selisih = (nilai - nilai_ideal) WHERE students.periode like "%'.$periode.'%"';

        $query2   = 'SELECT 
                    nis,
                    nama, 
                    aspek,
                    SUM(IF(kelompok="core",bobot,0))/SUM(IF(kelompok="core",1,0)) AS core,
                    SUM(IF(kelompok="secondary",bobot,0))/SUM(IF(kelompok="secondary",1,0)) AS secondary
                  FROM nilais
                    JOIN students USING(nis)
                    JOIN faktors USING(id_faktor)
                    JOIN aspeks USING(id_aspek)
                    JOIN gaps ON selisih=(nilai-nilai_ideal) WHERE students.periode like "%'.$periode.'%" GROUP BY nis,aspek';
         $query21   = 'SELECT 
         students.nama, 
         aspek,
         SUM(IF(kelompok="core",nilai_ideal,0)) as cores,
         SUM(IF(kelompok="secondary",nilai_ideal,0)) as second,
         SUM(IF(kelompok="core",nilai,0)) as coresget,
         SUM(IF(kelompok="secondary",nilai,0)) as secondget,
         count(IF(kelompok="core",id_faktor,0)) as CountCore,
         count(IF(kelompok="secondary",id_faktor,0)) as CountSecondary,
         (SUM(IF(kelompok="core",nilai,0)) / count(IF(kelompok="core",id_faktor,0))) as NCF,
         (SUM(IF(kelompok="secondary",nilai,0)) / count(IF(kelompok="secondary",id_faktor,0))) as NSF
       FROM nilais
         JOIN students USING(nis)
         JOIN faktors USING(id_faktor)
         JOIN aspeks USING(id_aspek)
         JOIN gaps ON selisih=(nilai-nilai_ideal) WHERE students.periode like "%'.$periode.'%"
         group by students.nama';
          
      $query_get = ' SELECT 
      b.nama,
      c.id_aspek,
      c.prosentase/100 AS persen,
      (
      SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6+
      SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4) AS nilai  
    FROM
      nilais a
      JOIN students b USING(nis)
      JOIN faktors d USING(id_faktor)
      JOIN aspeks c USING(id_aspek)
      JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
    GROUP BY b.nama,aspek
    ORDER BY b.nama';    

        $query3   = 'SELECT
                      f.nama,
                      SUM(IF(f.id_aspek=1,f.nilai,0)) AS Ni,
                      SUM(IF(f.id_aspek=2,f.nilai,0)) AS Ns,
                      SUM(IF(f.id_aspek=3,f.nilai,0)) AS Np,
                      (
                        SUM(IF(f.id_aspek=1,f.nilai*f.persen,0))+
                        SUM(IF(f.id_aspek=2,f.nilai*f.persen,0))+
                        SUM(IF(f.id_aspek=3,f.nilai*f.persen,0))
                      ) AS Hasil
                    FROM
                      (
                        SELECT 
                        b.nis,
                          b.nama,
                          c.id_aspek,
                          c.prosentase/100 AS persen,
                          (
                          (SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6)+
                          (SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4)
                          )/2 AS nilai  
                        FROM
                          nilais a
                          JOIN students b USING(nis)
                          JOIN faktors d USING(id_faktor)
                          JOIN aspeks c USING(id_aspek)
                          JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
                        GROUP BY b.nis,aspek
                        ORDER BY b.nama
                      ) f
                    GROUP BY f.nama
                    ORDER BY Hasil DESC';

        $nilaifaktor =  DB::SELECT('SELECT 
                        b.nama,
                        c.id_aspek,
                        c.prosentase/100 AS persen,
                        SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6 as NCF,
                        SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4 as NSF                       
                      FROM
                        nilais a
                        JOIN students b USING(nis)
                        JOIN faktors d USING(id_faktor)
                        JOIN aspeks c USING(id_aspek)
                        JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
                      GROUP BY b.nama,aspek
                      ORDER BY b.nama');
        $Nilai_total = DB::SELECT('SELECT
                    f.nama,
                    f.NCF,
                    f.NSF,
                    f.aspek,
                    (CASE WHEN f.id_aspek=1 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_K,
                    (CASE WHEN f.id_aspek=2 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_S                                              
                  FROM
                  (SELECT 
                        b.nis,
                        b.nama,
                        c.id_aspek,
                        c.aspek,
                        c.prosentase/100 AS persen,
                        SUM(IF(d.kelompok="Core",e.bobot,0))/SUM(IF(d.kelompok="Core",1,0))as NCF,
                        SUM(IF(d.kelompok="Secondary",e.bobot,0))/SUM(IF(d.kelompok="Secondary",1,0)) as NSF                      
                      FROM
                        nilais a
                        JOIN students b USING(nis)
                        JOIN faktors d USING(id_faktor)
                        JOIN aspeks c USING(id_aspek)
                        JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
                      GROUP BY b.nis,aspek
                      ORDER BY b.nama) as f
                    ');
        $nilai_rangking = DB::SELECT('SELECT
                                    b.nama,
                                    SUM(IF(b.id_aspek=1,b.N_K,0)) AS NK,
                                    SUM(IF(b.id_aspek=2,b.N_S,0)) AS NS,                   
                                    (
                                      SUM(IF(b.id_aspek=1,b.N_K*b.persen,0))+
                                      SUM(IF(b.id_aspek=2,b.N_S*b.persen,0))                        
                                    ) AS Hasil
                                  FROM
                            (SELECT
                                  f.nama,
                                  f.NCF,
                                  f.NSF,
                                  f.aspek,
                            f.id_aspek,
                            f.persen,
                                  (CASE WHEN f.id_aspek=1 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_K,
                                  (CASE WHEN f.id_aspek=2 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_S                                              
                                FROM
                                (SELECT 
                                      b.nis,
                                      b.nama,
                                      c.id_aspek,
                                      c.aspek,
                                      c.prosentase/100 AS persen,
                                      SUM(IF(d.kelompok="Core",e.bobot,0))/SUM(IF(d.kelompok="Core",1,0))as NCF,
                                      SUM(IF(d.kelompok="Secondary",e.bobot,0))/SUM(IF(d.kelompok="Secondary",1,0)) as NSF                      
                                    FROM
                                      nilais a
                                      JOIN students b USING(nis)
                                      JOIN faktors d USING(id_faktor)
                                      JOIN aspeks c USING(id_aspek)
                                      JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
                                    GROUP BY b.nis,aspek
                                    ORDER BY b.nama) as f) as b GROUP BY b.nama ORDER BY Hasil DESC');
//  dd($Nilai_total);
        $result   = DB::SELECT(DB::raw($query));
        $result1    = DB::select($skala);
        $result2  = DB::SELECT($query2);
        $result3  = DB::SELECT($query3);
        // $count_core = 
        // $tabel
        $managers = [
          'nama' => null,
          'nip'   =>null
        ];
        $get_tahun = DB::select('SELECT max(periode) as year_end, min(periode) as year_start FROM students');
        // $managers = Manager::select('nip','nama')->first();
        // dd($get_tahun);
        return view('adminpanel.hasil.index', compact ('nilai_rangking','get_tahun','managers', 'result', 'result1', 'result2' ,'result3','Nilai_total'));
    }
    public function searchYear(Request $request){
      // echo 'cek';
      $periode=  $request->periode;
      // dd('cel');
      // dd( $request->periode);
      $query    = 'SELECT 
                    nama, 
                    aspek, 
                    faktor, 
                    nilai_ideal, 
                    nilai, 
                    bobot, 
                    kelompok, 
                    (nilai-nilai_ideal) as hasil
                  FROM nilais
                    JOIN students USING (nis)
                    JOIN faktors USING (id_faktor)
                    JOIN aspeks USING (id_aspek)
                    JOIN gaps ON selisih = (nilai - nilai_ideal) WHERE students.periode like "%'.$periode.'%"';

$query2   = 'SELECT 
nis,
nama, 
aspek,
SUM(IF(kelompok="core",bobot,0))/SUM(IF(kelompok="core",1,0)) AS core,
SUM(IF(kelompok="secondary",bobot,0))/SUM(IF(kelompok="secondary",1,0)) AS secondary
FROM nilais
JOIN students USING(nis)
JOIN faktors USING(id_faktor)
JOIN aspeks USING(id_aspek)
JOIN gaps ON selisih=(nilai-nilai_ideal) WHERE students.periode like "%'.$periode.'%" GROUP BY nis,aspek';
$query21   = 'SELECT 
students.nama, 
aspek,
SUM(IF(kelompok="core",nilai_ideal,0)) as cores,
SUM(IF(kelompok="secondary",nilai_ideal,0)) as second,
SUM(IF(kelompok="core",nilai,0)) as coresget,
SUM(IF(kelompok="secondary",nilai,0)) as secondget,
count(IF(kelompok="core",id_faktor,0)) as CountCore,
count(IF(kelompok="secondary",id_faktor,0)) as CountSecondary,
(SUM(IF(kelompok="core",nilai,0)) / count(IF(kelompok="core",id_faktor,0))) as NCF,
(SUM(IF(kelompok="secondary",nilai,0)) / count(IF(kelompok="secondary",id_faktor,0))) as NSF
FROM nilais
JOIN students USING(nis)
JOIN faktors USING(id_faktor)
JOIN aspeks USING(id_aspek)
JOIN gaps ON selisih=(nilai-nilai_ideal) WHERE students.periode like "%'.$periode.'%"
group by students.nama';

$query_get = ' SELECT 
b.nama,
c.id_aspek,
c.prosentase/100 AS persen,
(
SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6+
SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4) AS nilai  
FROM
nilais a
JOIN students b USING(nis)
JOIN faktors d USING(id_faktor)
JOIN aspeks c USING(id_aspek)
JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
GROUP BY b.nama,aspek
ORDER BY b.nama';    

$query3   = 'SELECT
  f.nama,
  SUM(IF(f.id_aspek=1,f.nilai,0)) AS Ni,
  SUM(IF(f.id_aspek=2,f.nilai,0)) AS Ns,
  SUM(IF(f.id_aspek=3,f.nilai,0)) AS Np,
  (
    SUM(IF(f.id_aspek=1,f.nilai*f.persen,0))+
    SUM(IF(f.id_aspek=2,f.nilai*f.persen,0))+
    SUM(IF(f.id_aspek=3,f.nilai*f.persen,0))
  ) AS Hasil
FROM
  (
    SELECT 
    b.nis,
      b.nama,
      c.id_aspek,
      c.prosentase/100 AS persen,
      (
      (SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6)+
      (SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4)
      )/2 AS nilai  
    FROM
      nilais a
      JOIN students b USING(nis)
      JOIN faktors d USING(id_faktor)
      JOIN aspeks c USING(id_aspek)
      JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
    GROUP BY b.nis,aspek
    ORDER BY b.nama
  ) f
GROUP BY f.nama
ORDER BY Hasil DESC';

$nilaifaktor =  DB::SELECT('SELECT 
    b.nama,
    c.id_aspek,
    c.prosentase/100 AS persen,
    SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0))*0.6 as NCF,
    SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0))*0.4 as NSF                       
  FROM
    nilais a
    JOIN students b USING(nis)
    JOIN faktors d USING(id_faktor)
    JOIN aspeks c USING(id_aspek)
    JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
  GROUP BY b.nama,aspek
  ORDER BY b.nama');
$Nilai_total = DB::SELECT('SELECT
f.nama,
f.NCF,
f.NSF,
f.aspek,
(CASE WHEN f.id_aspek=1 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_K,
(CASE WHEN f.id_aspek=2 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_S                                              
FROM
(SELECT 
    b.nis,
    b.nama,
    c.id_aspek,
    c.aspek,
    c.prosentase/100 AS persen,
    SUM(IF(d.kelompok="Core",e.bobot,0))/SUM(IF(d.kelompok="Core",1,0))as NCF,
    SUM(IF(d.kelompok="Secondary",e.bobot,0))/SUM(IF(d.kelompok="Secondary",1,0)) as NSF                      
  FROM
    nilais a
    JOIN students b USING(nis)
    JOIN faktors d USING(id_faktor)
    JOIN aspeks c USING(id_aspek)
    JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
  GROUP BY b.nis,aspek
  ORDER BY b.nama) as f
');
$nilai_rangking = DB::SELECT('SELECT
                b.nama,
                SUM(IF(b.id_aspek=1,b.N_K,0)) AS NK,
                SUM(IF(b.id_aspek=2,b.N_S,0)) AS NS,                   
                (
                  SUM(IF(b.id_aspek=1,b.N_K*b.persen,0))+
                  SUM(IF(b.id_aspek=2,b.N_S*b.persen,0))                        
                ) AS Hasil
              FROM
        (SELECT
              f.nama,
              f.NCF,
              f.NSF,
              f.aspek,
        f.id_aspek,
        f.persen,
              (CASE WHEN f.id_aspek=1 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_K,
              (CASE WHEN f.id_aspek=2 THEN (((0.6*f.NCF)+(0.4*f.NSF))) END) as N_S                                              
            FROM
            (SELECT 
                  b.nis,
                  b.nama,
                  c.id_aspek,
                  c.aspek,
                  c.prosentase/100 AS persen,
                  SUM(IF(d.kelompok="Core",e.bobot,0))/SUM(IF(d.kelompok="Core",1,0))as NCF,
                  SUM(IF(d.kelompok="Secondary",e.bobot,0))/SUM(IF(d.kelompok="Secondary",1,0)) as NSF                      
                FROM
                  nilais a
                  JOIN students b USING(nis)
                  JOIN faktors d USING(id_faktor)
                  JOIN aspeks c USING(id_aspek)
                  JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
                GROUP BY b.nis,aspek
                ORDER BY b.nama) as f) as b GROUP BY b.nama ORDER BY Hasil DESC');
//  dd($Nilai_total);
        $result   = DB::SELECT(DB::raw($query));
        $result2  = DB::SELECT($query2);
        $result3  = DB::SELECT($query3);
        // $count_core = 
        // $tabel
        $managers = [
          'nama' => null,
          'nip'   =>null
        ];
         // $managers = Manager::select('nip','nama')->first();
        // dd($get_tahun);
        return view('adminpanel.hasil.hasilByYear', compact ('nilai_rangking','periode','managers', 'result', 'result2' ,'result3','Nilai_total'));
 
    }
    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel($type = null)
    {
      $type='xlsx';
        $data   = Nilai::get()->toArray();
        $data1  = Siswa::get()->toArray();
        return Excel::create('DataPenilaian', function($excel) use ($data, $data1) {
            $excel->sheet('mySheet', function($sheet) use ($data, $data1)
                {
                    $sheet->fromArray($data, $data1);
                });
        })->download($type);
    }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $jurusans = Jurusan::all();
        $pengujis = Penguji::all();
        return view('adminpanel.hasil.create', compact('jurusans', 'pengujis'));
    }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function store(StoreRequest $request)
    {
        //
    }


        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function show($id)
    {
        //
    }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function edit($id)
    {
        //
    }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function update(UpdateRequest $request, $id)
    {
        //
    }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function destroy($id)
    {
        //
    }
}
