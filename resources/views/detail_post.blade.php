@extends('main')

@section('title')
    Detail Post
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div id="content">
            <div class="row">
                <div class="col-4">
                    <p class="fw-light">Writer: {{$post->username}}</p>
                </div>
                <div class="col-4">
                    <p class="fw-light">Category: {{$post->category_name}}</p>
                </div>
                <div class="col-4">
                    <p class="fw-light">Tagged: {{$tag_name}}</p>
                </div>
            </div>
            <p class="text-break" style="font-size: 2vw;" > {{$post->title}} </p>
            @if ($post->photo_id)
                <img src="{{ asset('storage/' . $post->photo_dir) }}" alt="{{ $post->photo_dir }}" width="250px" class="me-3">  
            @endif
            <p class="text-break" style="font-size: 1.2vw;" > {{$post->post}} </p>
        </div>
    </div>
@endsection