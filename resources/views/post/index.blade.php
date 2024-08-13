@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Create Posts</h5>
                    <a href="{{route('post.create')}}" class="btn btn-outline-info">Add</a>

                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong></strong> {{Session::get('success')}}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong></strong> {{Session::get('error')}}!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <table class="table table-sm table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category ID</th>
                                <th scope="col">Created </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->content}}</td>
                                <td><img src="storage/{{$post->image}}" width="30" alt=""></td>
                                <td>{{$post->category_id }}</td>
                                <td>{{$post->created_at }}</td>

                                <td>
                                    <div>
                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-danger btn-sm">Edit </a>
                                        <a href="{{route('post.delete',$post->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </div>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection