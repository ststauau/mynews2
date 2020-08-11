<?php

// Laravel 19 課題


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;


// Profile Modelが扱えるようになる
use App\Profile;

// 以下を追記 17
use App\profileHistory;

// 以下を追記 17
use Carbon\Carbon;

class ProfileController extends Controller
{

    // profile リスト 16
    public function index(Request $request)
    {
        $name = $request->name;
        if ($name != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('title', $name)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'name' => $name]);
    }  

    
}
