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
                    @include('layouts.partials.errors')
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8 form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" id="name" name="title">
                            <small class="form-text text-muted">
                                Your Title must be 5-10characters long.
                              </small>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 form-group">
                            <label for="name">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}" id="name" name="slug">
                            <small class="form-text text-muted">
                                Your slug must be 10-20 characters long.
                              </small>
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 form-group">
                            <label for="name">Content</label>
                            <input type="type" class="form-control @error('content') is-invalid @enderror"  value="{{old('content')}}"id="name" name="content">
                            <small class="form-text text-muted">
                                Your content  must be 10-20 characters long.
                              </small>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-8 form-group">
                                <label for="file">Choose a file:</label>
                              <input type="file" class="form-control-file" id="file" name="image" >        
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-md-8 form-group">
                            <label for="name">Category ID</label>
                            <input type="text" class="form-control @error('category_id') is-invalid @enderror"  value="{{old('category_id')}}"id="name" name="category_id">
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