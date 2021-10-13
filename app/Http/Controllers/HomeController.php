<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\AppModel\Karyawan;
use App\AppModel\Aspek;
use App\AppModel\Faktor;
use App\AppModel\Nilai;
use App\AppModel\Gap;
use DB;
use App\AppModel\Manager;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $periode = date('Y');
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
                  nama, 
                  aspek,
                  SUM(IF(kelompok="core",bobot,0))/SUM(IF(kelompok="core",1,0)) AS core,
                  SUM(IF(kelompok="secondary",bobot,0))/SUM(IF(kelompok="secondary",1,0)) AS secondary
                FROM nilais
                  JOIN students USING(nis)
                  JOIN faktors USING(id_faktor)
                  JOIN aspeks USING(id_aspek)
                  JOIN gaps ON selisih=(nilai-nilai_ideal) WHERE students.periode like "%'.$periode.'%"';
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
                      ORDER BY b.nama
                    ) f
                  GROUP BY f.nama
                  ORDER BY Hasil DESC';

      $nilaifaktor =  DB::SELECT('SELECT 
                      b.nama,
                      c.id_aspek,
                      c.prosentase/100 AS persen,
                      SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0)) as NCF,
                      SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0)) as NSF                       
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
                  (CASE WHEN f.id_aspek=1 THEN ((f.NCF+f.NSF)/2) END) as N_K,
                  (CASE WHEN f.id_aspek=2 THEN ((f.NCF+f.NSF)/2) END) as N_S                                              
                FROM
                (SELECT 
                      b.nama,
                      c.id_aspek,
                      c.aspek,
                      c.prosentase/100 AS persen,
                      SUM(IF(d.kelompok="core",e.bobot,0))/SUM(IF(d.kelompok="core",1,0)) as NCF,
                      SUM(IF(d.kelompok="secondary",e.bobot,0))/SUM(IF(d.kelompok="secondary",1,0)) as NSF                      
                    FROM
                      nilais a
                      JOIN students b USING(nis)
                      JOIN faktors d USING(id_faktor)
                      JOIN aspeks c USING(id_aspek)
                      JOIN gaps e ON e.selisih=(a.nilai-d.nilai_ideal) WHERE b.periode like "%'.$periode.'%"
                    GROUP BY b.nama,aspek
                    ORDER BY b.nama) as f
                  ');
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
      
          return view('home', compact ('get_tahun','managers', 'result', 'result1', 'result2' ,'result3','Nilai_total'));
    }
}
