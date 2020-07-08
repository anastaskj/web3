@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Cart</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Cart::count()>0)
                    <h3> {{Cart::count()}} item(s) in your shopping cart</h3>
                    <hr>
                    @foreach(Cart::content() as $item)
                    <div class = "container">
                        <div class = "row">
                            <div class = "col">
                                <a href = "food/{{$item->id}}"><img class="card-img-top col-10" src="storage/avatars/{{$item->model->avatar}}" alt="Card image cap"></a>
                            </div>
                            <div class = "col-6"> 
                                <div class = "item"><a href = "food/{{$item->id}}">{{$item->name}}</a></div>
                                <div class = "desc">{{$item->model->description}}</div>                          
                            </div>
                            <div class = "col-1">
                                {{$item->qty}}
                            </div> 
                            <div class = "col-2">
                                Price: €{{number_format($item->price, 2)}}
                                <form action = "{{route('cart.destroy', $item->rowId)}}" method = "POST">
                                    {{ csrf_field() }}
                                     {{ method_field('DELETE')}}
                                <button type = "submit" class = "btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class = "float-right">
                        <p> Subtotal: €{{Cart::subtotal()}}</p>
                        <p> Tax: €{{Cart::tax()}}</p>
                        <p> Total Price: €{{Cart::total()}}</p>
                        <a href="{{ route('checkout.index') }}" class = "btn-lg btn btn-success">Proceed to checkout</a>
                    </div>
                    @else
                    <h3>No items in cart</h3>
                    <hr>
                    <a href = "{{ url('/food') }}">Click here to see what we offer.</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection