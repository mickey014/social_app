@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/kirkpic.png" class="w-100 rounded-circle" alt="">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex align-items-center pb-4">
                <h1>Skirk</h1>
            </div>

            <div class="d-flex gap-5">
                <div><strong>127k</strong> posts</div>
                <div><strong>22k</strong> followers</div>
                <div><strong>34k</strong> following</div>
            </div>

            <div class="pt-4 font-weight-bold">Skirk</div>
            <div>Lorem ipsum dolor sit amet.</div>
            <div><a href="javascript:;">skirk.com</a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="img/post1.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="img/post2.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="img/post3.jpg" alt="" class="w-100">
        </div>
    </div>
</div>
@endsection
