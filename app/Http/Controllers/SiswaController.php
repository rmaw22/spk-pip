<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Siswa;
use App\Http\Requests;
use App\Http\Requests\Siswa\StoreRequest;
use App\Http\Requests\Siswa\UpdateRequest;
use App\AppModel\Aspek;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
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
        $siswas = Siswa::all();
        return view('adminpanel.siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $siswas = new Siswa();
        $siswas->nis =  $request->nis;
    
        $siswas->nama =  $request->nama;
        $siswas->tempat_lahir = $request->tempat_lahir;
        $siswas->tgl_lahir = $request->tgl_lahir;
        $siswas->kelamin = $request->kelamin;
        $siswas->agama = $request->agama;
        $siswas->phone = $request->phone;
        $siswas->save();
        return redirect()->route('siswa.index')->with('alert-success', 'Berhasil Menambah Data');
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
        $siswas = Siswa::findOrFail($id);
        return view('adminpanel.siswa.edit', compact('siswas'));
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
        $siswas = Siswa::findOrFail($id);
        $siswas->nis =  $request->nis;
        
        $siswas->nama =  $request->nama;
        $siswas->tempat_lahir = $request->tempat_lahir;
        $siswas->tgl_lahir = $request->tgl_lahir;
        $siswas->kelamin = $request->kelamin;
        $siswas->agama = $request->agama;
        $siswas->phone = $request->phone;
        $siswas->save();
        return redirect()->route('siswa.index')->with('alert-success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Siswa::destroy($request->checkItem); 
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