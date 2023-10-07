@extends('layouts.admin.admin_layout')

@section('title','Posts')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            Id
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Category
                        </th>
                        <th style="width:40%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                <a>{{$post->title}}</a>
                                <br>
                                <small>{{$post->created_at}}</small>
                            </td>
                            <td>{{\App\Models\Category::where('id',$post->category_id)->first()}}</td>

                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{route('post.edit',$post['id'])}}" >
                                    <i class="fas fa-pencil-alt" ></i> Edit
                                </a>
                                <form action="{{route('post.destroy', $post['id'])}}" method="POST"  style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type=submit class="delete-btn btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($posts) == 0)
                    <h3 class="m-3">No posts</h3>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
