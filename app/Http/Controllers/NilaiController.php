<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Nilai;
use App\AppModel\Aspek;
use App\AppModel\Faktor;
use App\AppModel\Siswa;
use DB;
use App\Http\Requests;
use App\Http\Requests\Nilai\StoreRequest;
use App\Http\Requests\Nilai\UpdateRequest;

class NilaiController extends Controller
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
      $query = 'SELECT
      nilais.* , students.nama as nama_siswa, aspeks.aspek as aspek, faktors.faktor as faktor
      FROM
      nilais
      JOIN students USING (nis)
      JOIN aspeks ON (nilais.id_aspeks = aspeks.id_aspek)
      JOIN faktors USING (id_faktor)';

      $nilais = DB::SELECT($query);
        // dd($nilais);
        return view('adminpanel.nilai.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $aspeks = DB::table('aspeks')->pluck('aspek', 'id_aspek');
      $siswas = Siswa::all();
        return view('adminpanel.nilai.create', compact('aspeks', 'siswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function FaktorAjax($id)
     {
         $faktors = DB::table('faktors')->where("id_aspek",$id)->pluck('faktor', 'id_faktor');
         return json_encode($faktors);
     }

    public function store(StoreRequest $request)
    {
        $nilai = new Nilai();
        $nilai->nis = $request->nis;
        $nilai->id_aspeks = $request->aspek;
        $nilai->id_faktor = $request->id_faktor;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return redirect()->route('nilai.index')->with('alert-success', 'Berhasil Menambah Data');
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
        $nilais = Nilai::join('students', 'nilais.nis', '=', 'students.nis')
                -> join('aspeks', 'nilais.id_aspeks', '=', 'aspeks.id_aspek')
                -> join('faktors', 'nilais.id_faktor', '=', 'faktors.id_faktor')
                -> where('nilais.id', '=', $id)
                -> select('nilais.*', 'students.nis AS karyawan_id', 'students.nama AS karyawan_name', 'aspeks.id_aspek AS aspek_id', 'aspeks.aspek AS aspek_name', 'faktors.id_faktor AS faktor_id', 'faktors.faktor AS faktor_name')
                -> first();
        // dd($nilais->id_aspeks);
        $aspeks = Aspek::all();
        $faktors = Faktor::where('id_aspek',$nilais->id_aspeks)->get();
        // dd($faktors);
        $siswas = Siswa::all();
        return view('adminpanel.nilai.edit', compact('nilais', 'aspeks', 'faktors', 'siswas'));
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
        $nilai = Nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->id_aspeks = $request->aspek;
        $nilai->id_faktor = $request->id_faktor;
        $nilai->nilai = $request->nilai;
        $nilai->save();
        return redirect()->route('nilai.index')->with('alert-success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Nilai::destroy($request->checkItem); 
    return back();
    }

    public function postImport()
    {
        # code...
        Excel::load(Input::file('file'), function ($reader)
        {
            # code...
            $reader->each(function($sheet)
            {
                    Aspek::firstOrCreate($sheet->toArray());
            });
        });
        echo "Success";
    }
}
