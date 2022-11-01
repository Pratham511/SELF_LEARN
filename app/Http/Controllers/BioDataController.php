<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioDataController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $da= (object)$data;
        $d= json_decode(json_encode($da ,true),true);
        dd($d);
        

    }
}
