<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\Post;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()) {
            $params['access'] = UserInfo::get_user_role(Auth::user()->id);
        }
        else $params['access'] = 0;
        $params['posts'] = Post::all();
        return view('notice_board', $params);
    }

    public function add(){
        Validation::isAdmin();

        return redirect()->route('main');
    }
}
