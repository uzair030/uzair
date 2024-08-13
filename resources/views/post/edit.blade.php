@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Create Posts</h5>
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{route('post.update',$post->id)}}" method="post">
                        @csrf
                        


                        <div class="col-md-8 form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" value="{{$post->title}}" name="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 form-group">
                            <label for="name">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="name" value="{{$post->slug}}" name="slug">
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 form-group">
                            <label for="name">Content</label>
                            <input type="type" class="form-control @error('content') is-invalid @enderror" id="name" value="{{$post->content}}" name="content">
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-8 form-group">
                                <label for="file">Choose a file:</label>
                              <input type="file" class="form-control-file" id="file" value="{{$post->image}}" name="image" >        
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-8 form-group">
                            <label for="name">Category ID</label>
                            <input type="text" class="form-control @error('category_id') is-invalid @enderror" id="name" value="{{$post->category_id}}" name="category_id">
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     
                        
                       
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection