<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WajibPajakController extends Controller {

	//
	public function tutupnpwpd(){
		return view('tutupnpwpd');
	}

	public function editnpwpd(){
		return view('editnpwpd');
	}

	public function hapusnpwpd(){
		return view('hapusnpwpd');
	}

	public function tambahnpwpd(){
		return view('tambahnpwpd');
	}

}
