@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="row">
                    <label  class="col-md-3" for="title">Title</label>
                <div class="col-md-6"> <input type="text" name="title" class="form-control" value="{{ $category->title }}"> </div>
                    <div class="clearfiw"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </div>
</section>
@endsection