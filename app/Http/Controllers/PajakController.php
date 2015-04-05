<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PajakController extends Controller {

	//
	public function showKelola(){
		return view('kevin.kelolapajak');
	}
	
	public function showSptpd(){
		return view('kevin.sptpdview');
	}
	
	public function showStatus(){
		return view('kevin.statuspajak');
	}

}
