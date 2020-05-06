{{-- layouts/users.blade.phpを読み込む --}}
@extends('layouts.users')

{{-- users.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ユーザー　プロフィール編集（lauouts読み込み）')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザー　プロフィール編集（lauouts読み込み）</h2>
            </div>
        </div>
    </div>
@endsection
