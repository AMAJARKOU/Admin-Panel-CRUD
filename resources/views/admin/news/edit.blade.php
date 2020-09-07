@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit News</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="row">
                    <label  class="col-md-3" for="title">Title</label>
                    <div class="col-md-6"> <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}"> </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label  class="col-md-3" for="author">Author</label>
                <div class="col-md-6"> <input type="text" name="author" id="author" class="form-control" value="{{ $news->author }}"> </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label  class="col-md-3" for="author">Category</label>
                    <div class="col-md-6">
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($category->id == $news->category_id)
                                        selected
                                    @endif
                                    > {{ $category->title }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label  class="col-md-3" for="image">Image</label>
                    <div class="col-md-9"> <input type="file" name="image" id="image"> </div>
                    <div class="clearfix"></div>
                    
                    @if ($news->image)
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <img src="{{ asset('storage/news/'.$news->image) }}" style="width: 150px">
                        </div>
                        <div class="clearfix"></div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label  class="col-md-3" for="description">Description</label>
                    <div class="col-md-6">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $news->description }}</textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Update">
            </div>
        </form>
    </div>
</section>
@endsection