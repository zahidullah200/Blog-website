@extends('layouts.master')

@section('title','View Posts')

@section('content')
<div class="container-fluid px-4">

    <div class="card">
        <div class="card-header">
            <h4>View Posts
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Posts</a>
            </h4>

        </div>
        <div class="card-body">
            <div class="table-responsive">
        <table class="table table-bordered" id="myDataTable">
        <div class="mb-3">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category </th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                     <!-- here categrory is the function in post models which I have created for the  -->
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->name}}</td>
                       
                        <td>{{$post->status=='1'? 'Hidden':'Show'}}</td>
                        <td>
                            <a href="{{url('admin/edit-post/'. $post->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('admin/delete-post/'. $post->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>


        
        </div>
    </div>

</div>

@endsection