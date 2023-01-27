@extends('main')

@section('title')
    New Post
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div id="header">
            <div class="d-flex flex-row gap-3 align-items-center mb-3">
                <h3 class="mb-0">New Post</h3>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <form action="{{ route('post-simpan') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                        <input 
                            type="text" 
                            class="form-control mb-3" 
                            id="title" 
                            name="title" 
                            maxlength="100"
                            placeholder="Title"
                            style="font-size: 2vw;"
                            required
                        >
                        <textarea 
                            type="text" 
                            class="form-control mb-3" 
                            id="post" 
                            name="post"
                            placeholder="Start typing..."
                            style="font-size: 1.2vw;"
                            rows="15"
                            required
                        ></textarea>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="d-grid gap-2">
                            <div class="form-group">
                                <label for="kategori" class="form-label">Tambah Kategori:</label>
                                <select class="form-select" id="kategori" name="kategori">
                                    @foreach ($category as $c)
                                        <option value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tag" class="form-label">Tambah Tag:</label>
                                <select class="form-select" id="tag" name="tag[]" multiple>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->user_id }}">{{ $u->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto" class="form-label">Tambah Foto:</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div id="foto-preview"></div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection