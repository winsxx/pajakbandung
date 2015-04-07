<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MainMenuController extends Controller {

    public function getDinasHome(){
        return view('mainmenu.dinashome');
    }

    public function getWpHome(){
        return view('mainmenu.wphome');
    }

    public function getIndex(){
        return view('mainmenu.landing');
    }

}
