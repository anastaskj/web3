@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Dishes</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p> These are the dishes that we offer. </p>
                 
                   {!! Form::open(['method'=>'GET','url'=>'food','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default-sm" type="submit">
                                        Search
                                    </button>
                                </span>
                        </div>
                    {!! Form::close() !!}

                   @if(count($food) > 0)
                   @foreach($food as $dish)
                   
                    <div class="card d-inline-block m-4" style="width: 18rem;">
                            <a href = "food/{{$dish->id}}"> 
                            <img class="card-img-top" src="storage/avatars/{{$dish->avatar}}" alt="Card image cap">
                            <div class="card-body ">
                              <h5 class="card-title border-bottom border-top">{{$dish->name}}</h5>
                              <p class="card-text float-right">€{{number_format($dish->price, 2)}}</p>
                              <br>
                            </div>
                        </a>
                    </div>

                      
                   @endforeach
                   {{$food->links()}}
                   @else
                   <p>No dishes found</p>
               @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
