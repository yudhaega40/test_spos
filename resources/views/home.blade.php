@extends('main')

@section('title')
    Daftar Post
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div id="header">
            <div class="d-flex flex-row gap-3 align-items-center mb-3">
                <h3 class="mb-0">Daftar Post</h3>
            </div>
        </div>
        <div id="content">
            @foreach ($post as $p)
            <div class="card mb-3" style="width: 90%;">
                <div class="card-body p-4">
                    <h5 class="card-title">{{ $p->title }}</h5>
                    <p class="card-text"> 
                        @php
                        if(strlen($p->post) > 180){
                            $new_post = substr($p->post,0,177);
                            $new_post2 = $new_post . '...';
                            echo $new_post2;
                        }else{  
                            echo $p->post;
                        }
                        @endphp
                    </p>
                    <a href="detail_post/{{$p->post_id}}">Read more</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection