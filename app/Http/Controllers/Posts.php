<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class Posts extends Controller
{
    public $params = [];
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $params['posts'] = Post::all();
        return view('notice_board', $params);
    }

    public function add(){
        return view('main');
    }
}
