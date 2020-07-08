@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$food->name}} </h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class = "row">
                        <img class="card-img-top w-25 h-25 col-5" src="../storage/avatars/{{$food->avatar}}" alt="Card image cap">                    
                        <div class = "col-7">
                            Description
                            <p class= "border-top">{{$food->description}} </p>
                            Category
                            <p class= "border-top">{{$food->category}} </p>
                            <p class = "float-right"> Cost: €{{ number_format($food->price, 2)}}</p>
                        </div>
                    </div>

                    <hr>
                    <form name = "addtocart" id = "addtocart" action = "{{route('cart.store')}}" method = "POST";>
                        {{ csrf_field() }}
                    <input type = "hidden" name = "id" value = "{{$food->id}}">
                    <input type = "hidden" name = "name" value = "{{$food->name}}">
                    <input type = "hidden" name = "price" value = "{{$food->price}}">
                    <div class = "float-right">
                        <input type = "text" name = "quantity" value = "1" size="3">
                        <button type ="submit" class = "btn btn-default" id = "cartButton">
                            <i class = "shoppingCart"></i>
                            Add to cart
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
