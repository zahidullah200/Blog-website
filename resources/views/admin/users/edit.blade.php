@extends('layouts.master')

@section('title','edit post')

@section('content')
<div class="container-fluid px-4">
 
    <div class="card mt-4">
    <h4 class="">Edit User

    <a href="{{url('admin/user')}}" class="btn btn-danger btn-sm float-end">Back</a>
    </h4>
        <div class="card-header">
        


        </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
    </div>
        @endif

  
             @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="mb-3">
                <label>Full Name</label>
                <p class="form-control">{{$users->name}}</p>
            </div>
            <div class="mb-3">
                <label>Email ID</label>
                <p class="form-control">{{$users->email}}</p>
            </div>
            <div class="mb-3">
                <label>Created at</label>
                <p class="form-control">{{$users->created_at->format('d/m/y')}}</p>
            </div>

               
           
         <form action="{{url('admin/update-user/'.$users->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Role as</label>
                <select id="" name="roll_as" class="form-control">
                    <option value="1" {{$users->roll_as=='1'?'selected':''}}>Admin</option>
                    <option value="0" {{$users->roll_as=='0'?'selected':''}}>User</option>
                    <option value="2" {{$users->roll_as=='2'?'selected':''}}>Blogger</option>

                </select>
            </div>
            <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update User Role</button>
                </div>
          

        </form>

    </div>

    </diV>
</div>
@endsection