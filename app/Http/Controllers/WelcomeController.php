<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModel\Siswa;
use App\AppModel\Aspek;
use App\Http\Requests;

class WelcomeController extends Controller
{
    public function index()
    {
    	$pendaftars = Siswa::all();
    	$jurusans = Aspek::all();
    	$hasils = null;
    	return view('welcome', compact('pendaftars', 'jurusans', 'hasils'));
    }
}
