@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Select Category</h5>
                    <a href="{{route('category.create')}}" class="btn btn-outline-success btn-sm">Add</a>

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
                                <th scope="col">Name</th>
                                <th scope="col">Created </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cat)
                            
                            <tr>
                                <th scope="row">{{$cat->id}}</th>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->created_at }}</td>
                                <td>
                                    <div>
                                        <a href="{{route('category.edit',$cat->id)}}" class="btn btn-outline-danger btn-sm">Edit </a>
                                        <a href="{{route('category.delete',$cat->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
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