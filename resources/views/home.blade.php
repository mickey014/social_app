@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/kirkpic.png" class="w-100 rounded-circle" alt="">
        </div>
        <div class="col-9 p-5">

            <div class="d-flex justify-content-between align-items item-baseline">
                <div class="d-flex align-items-center pb-4">
                    <h1>{{ $user->username; }}</h1>
                </div>
    
                <a href="/p/create">Add New Post</a>
            </div>

            <div class="d-flex gap-5">
                <div><strong>{{ $user->posts->count(); }}</strong> posts</div>
                <div><strong>22k</strong> followers</div>
                <div><strong>34k</strong> following</div>
            </div>

            

            <div class="pt-4 font-weight-bold">{{ $user->profile->title; }}</div>
            <div>{{ $user->profile->description; }}</div>
            <div><a href="javascript:;">{{ $user->profile->url; }}</a></div>
        </div>
    </div>

    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4 pb-3">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image;}}" alt="{{$post->image;}}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
