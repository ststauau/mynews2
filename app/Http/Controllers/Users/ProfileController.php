<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

   // ユーザーサイド　+ - + - + - + - + - + - + - + - + - + - + - + 

   public function add()
   {
       return view('users.profile.create');
   }

   public function create()
   {
       return redirect('users/profile/create');
   }

   public function edit()
   {
       return view('users.profile.edit'); 
   }

   public function update()
   {
       return redirect('users/profile/edit');
   }


}
