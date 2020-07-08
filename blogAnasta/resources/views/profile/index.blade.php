@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Profile</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class = "row">
                    <div class = "col-5">
                        <div class="profile-header-container">
                            <div class="profile-header-img">
                                <img class="rounded-circle w-75 h-75 p-3" src="storage/avatars/{{ $user->avatar }}"/>
                                
                                <div class="rank-label-container">
                                    <span class="w-100 p-3 ml-3">{{$user->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>    
                        <div class = "col-6">
                            <p>Email: {{$user->email}} </p>
                        @if($user->age>0)    
                            <p>Age: {{$user->age}} </p> 
                            <p>Phone: {{$user->phone}} </p>
                            <p>Address: {{$user->city}} | {{$user->line1}} {{$user->line2}} </p>
                        @endif
                            <p>Account created: {{$user->created_at}} </p>
                        </div>
                </div>
                <hr>
                    <a href = "profile/{{$user->id}}/edit" class = "btn btn-default float-right">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection