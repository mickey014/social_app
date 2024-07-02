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
    
                <a href="javascript:;">Add New Post</a>
            </div>

            <div class="d-flex gap-5">
                <div><strong>127k</strong> posts</div>
                <div><strong>22k</strong> followers</div>
                <div><strong>34k</strong> following</div>
            </div>

            

            <div class="pt-4 font-weight-bold">{{ $user->profile->title; }}</div>
            <div>{{ $user->profile->description; }}</div>
            <div><a href="javascript:;">{{ $user->profile->url; }}</a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="{{ url('/') }}/img/post1.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="{{ url('/') }}/img/post2.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="{{ url('/') }}/img/post3.jpg" alt="" class="w-100">
        </div>
    </div>
</div>
@endsection
