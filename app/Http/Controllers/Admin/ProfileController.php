<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


// Profile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{

    // 管理者サイド+ - + - + - + - + - + - + - + - + - + - + - + 

    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {

         // 以下を追加
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();


      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    //   if (isset($form['image'])) {
    //     $path = $request->file('image')->store('public/image');
    //     $news->image_path = basename($path);
    //   } else {
    //       $news->image_path = null;
    //   }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
//      unset($form['image']);




      // データベースに保存する
      $profile->fill($form);
      $profile->save();


      return redirect('admin/profile/create');
    }


 
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


    public function edit(Request $request)
    {

     // 16
     // Profile Modelからデータを取得する
     $profile = Profile::find($request->id);
     if (empty($profile)) {
       abort(404);    
     }
     return view('admin.profile.edit', ['profile_form' => $profile]);
                                            // ↑これはどこで定義されてる？
     //   return view('admin.profile.edit'); 

    }

    public function update(Request $request)
    {

     // 16        
    // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
    
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
    
        return redirect('admin/profile/edit');

        // return redirect('admin/profile/edit');

    }




    
}
