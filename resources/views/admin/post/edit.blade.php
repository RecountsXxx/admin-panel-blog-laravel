@extends('layouts.admin.admin_layout')

@section('title','Edit post')

@section('content')
    <!doctype html>
<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success mb-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
            </div>
        @endif
        <div class="card card-primary">
            <form action="{{route('post.update',$post['id'])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" required class="form-control" value="{{$post->title}}" id="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label>Select category</label>
                        <select required name="category_id"  class="custom-select">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="editor"  name="text">{{$post->text}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Feature Image</label>
                        <input class="form-control" type="text" id="img" name="img" value="{{$post->img}}" readonly>
                        <button class="btn btn-primary popup_selector mt-2" data-inputid="img">Update image</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
