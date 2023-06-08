@extends('layouts.master')

@section('title','View users')

@section('content')
<div class="container-fluid px-4">

    <div class="card">
        <div class="card-header">
            <h4>View Users</h4>

        </div>
        <div class="card-body">
        <table class="table table-bordered" id="myDataTable">
        <div class="mb-3">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USERNAME </th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                     <!-- here categrory is the function in post models which I have created for the  -->
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                       
                        <td>{{$user->roll_as=='1'? 'Admin':'User'}}</td>
                        <td>
                            <a href="{{url('admin/user/'. $user->id)}}" class="btn btn-success">Edit</a>
                        </td>
                    

                    </tr>
                    @endforeach
                </tbody>

            </table>


        
        </div>
    </div>

</div>

@endsection