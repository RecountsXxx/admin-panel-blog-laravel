@extends('layouts.admin.admin_layout')

@section('title','Edit category: ' . $category->title);

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                </div>
            @endif
            <div class="card card-primary">
                <form action="{{route('category.update',$category['id'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">New title</label>
                            <input type="text" name="title" required class="form-control" id="title" value="{{$category['title']}}" placeholder="Enter title category">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
