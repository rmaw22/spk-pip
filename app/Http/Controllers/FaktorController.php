<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Faktor;
use App\AppModel\Aspek;
use DB;
use App\Http\Requests;
use App\Http\Requests\Faktor\StoreRequest;
use App\Http\Requests\Faktor\UpdateRequest;

class FaktorController extends Controller
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
        $faktor = 'SELECT
            *
            FROM
            faktors
            JOIN aspeks USING (id_aspek)';

        $faktors = DB::SELECT($faktor);

        return view('adminpanel.faktor.index', compact('faktors'));
    }

    public function dataCategory()
    {
        $collection = collect([
            (object) [
                "code" => "K1",
                "id_aspek" => 1,
                "category" => "Memiliki KIS/KPS",
                "nilai_ideal" => 4
            ],
            (object) [
                "code" => "K2",
                "id_aspek" => 1,
                "category" => "Kondisi orang tua",
                "nilai_ideal" => 4
            ],
            (object) [
                "code" => "K3",
                "id_aspek" => 1,
                "category" => "Peserta Didik Berkebutuhan Khusus",
                "nilai_ideal" => 4
            ],
            (object) [
                "code" => "K4",
                "id_aspek" => 1,
                "category" => "Tempat Tinggal Peserta Didik",
                "nilai_ideal" => 4
            ],
            (object) [
                "code" => "K5",
                "id_aspek" => 1,
                "category" => "Kondisi Peserta Didik",
                "nilai_ideal" => 4
            ],
            (object) [
                "code" => "S1",
                "id_aspek" => 2,
                "category" => "Kesopanan",
                "nilai_ideal" => 4
            ],
            (object) [
                "code" => "S2",
                "id_aspek" => 2,
                "category" => "Tingkah Laku",
                "nilai_ideal" => 4
            ]
        ]);

        return $collection;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aspeks = Aspek::pluck('aspek', 'id_aspek');
        $Faktors = Faktor::all();
        // dd($this->dataCategory()->where('category',"Tempat Tinggal Peserta Didik")->first());
        return view('adminpanel.faktor.create', compact('aspeks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $nilai_ideal =  $this->dataCategory()->where('category',$request->category)->first()->nilai_ideal;
        $faktors = new Faktor();
        $faktors->id_aspek = $request->aspek;
        $faktors->faktor = $request->faktor;
        $faktors->nilai_sub = $request->nilai;
        $faktors->kelompok = $request->kelompok;
        $faktors->category = $request->category;
        $faktors->nilai_ideal =  $nilai_ideal;
        if ($faktors->save()) {
            return redirect()->route('faktor.index')->with('alert-success', 'Input Success');
        }else{
            return redirect()->route('faktor.index')->with('alert-danger', 'Input Error');

        } 
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
        $faktors = Faktor::join('aspeks', 'faktors.id_aspek', '=', 'aspeks.id_aspek')
            ->SELECT('faktors.*', 'faktors.id_aspek as aspekid', 'aspeks.aspek as aspek', 'faktors.category')
            ->where('faktors.id_faktor', '=', $id)
            ->first();
        $aspeks = Aspek::all();
        $categorys = Faktor::where('id_faktor', '=', $id)
            ->first();
        // dd($categorys)
        return view('adminpanel.faktor.edit', compact('faktors', 'aspeks', 'categorys'));
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
        $nilai_ideal =  $this->dataCategory()->where('category',$request->category)->first()->nilai_ideal;
        $faktors = Faktor::findOrFail($id);
        $faktors->id_aspek = $request->aspek;
        $faktors->faktor = $request->faktor;
        $faktors->nilai_sub = $request->nilai;
        $faktors->kelompok = $request->kelompok;
        $faktors->category = $request->category;
        $faktors->nilai_ideal = $nilai_ideal;
        $faktors->save();
        return redirect()->route('faktor.index')->with('alert-success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Faktor::destroy($request->checkItem);
        // return back();
        $ids = $request->id;
        DB::table('faktors')->whereIn('id_faktor', $ids)->delete();
        return response()->json([
            'status' => true,
            'message' => 'OK',
        ]);
    }

    public function postImport()
    {
        # code...
        Excel::load(Input::file('file'), function ($reader) {
            # code...
            $reader->each(function ($sheet) {
                Aspek::firstOrCreate($sheet->toArray());
            });
        });
        echo "Success";
    }

    public function getCategory($id)
    {
        //get category
        // $getCategory = DB::table('faktors')->where("id_aspek", $id)->groupby('category')->pluck('category');
        $getCategory = $this->dataCategory()->where('id_aspek',intval($id));
        // dd($this->dataCategory());
        return $getCategory;
    }
}
