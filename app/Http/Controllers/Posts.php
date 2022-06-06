<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Validation;
use App\Models\Post;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function add(Request $request){
        Validation::isAdmin();

        $file = $request->file('file');
//        dd($request);
        if (!$file){
            $params['access'] = UserInfo::get_user_role(Auth::user()->id);
            $params['error'] = 'Файл не додан';
            return view('task', $params);
        }

        $post = new Post();
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->img = ' ';
        $post->save();

        $path = $post->id;

        $file_name = $file->store('/tasks/user-'.Auth::user()->id.'/'.$path, 'storage');
        $path = '/storage/'.$file_name;
        $post->img = $path;
        $post->save();

        return redirect()->route('main');
    }

    public function delete($post_id){
        if (!Validation::isAdmin()) return redirect()->route('main');
        $post = Post::where('id', $post_id)->first();
        $post->delete();

        return redirect()->route('main');
    }
}
