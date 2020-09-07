@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-md-2">Add New News</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($news))
                    @foreach ($news as $new)
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->category->title }}</td>
                            <td>
                                <div class="row">
                                    <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-info">Edit</a>

                                    <form id="form-id" method="POST" action="{{ route('admin.news.destroy', $new->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr><td colspan="3">No News to show</td></tr>
                @endif
            </tbody>
        </table>
        {{ $news->render() }}
    </div>
</section>
@endsection