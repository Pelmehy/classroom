<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;

class Course extends Controller
{
    public $params = [];
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $params['courses'] = Cource::all();
        return view('main', $params);
    }

    public function addForm(){
        return view('new_course');
    }
}
