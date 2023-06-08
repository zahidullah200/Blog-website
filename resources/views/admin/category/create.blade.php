@extends('layouts.master')

@section('title','create')

@section('content')
<div class="container-fluid px-4">
 
    <div class="card mt-4">
    
        <div class="card-header">
        <h4>Add Category<a href="{{url('admin/category')}}" class="btn btn-primary btn-sm float-end">View Category</a></h4>


        </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
    </div>
        @endif

        <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <label for="">Category</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea  rows="5" class="form-control" name="description" id="mySummernote"></textarea>
            </div>

            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea  rows="3" class="form-control" name="meta_description"></textarea>
            </div>

            <div class="mb-3">
                <label for="">Keywords</label>
                <textarea rows="3" class="form-control" name="meta_keyword"></textarea>
            </div>

            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Navbar Status</label>
                    <input type="checkbox"  name="navbar_status">
                </div>

                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"  name="status">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </div>


        </form>

    </div>

    </diV>
</div>
@endsection