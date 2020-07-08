@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Checkout</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p> Here is an overview of your order. </p>
                    <hr>

                    @foreach(Cart::content() as $item)
                    <div class="container container-small">
                       <div class = "row">
                           <div class = "col">
                               <a href = "food/{{$item->id}}"><img class="card-img-top col-6" src="storage/avatars/{{$item->model->avatar}}" alt="Card image cap"></a>
                           </div>
                           <div class = "col-5"> 
                               <div class = "item"><a href = "food/{{$item->id}}">{{$item->name}}</a></div>
                           </div>
                           <div class = "col-1">
                                {{$item->qty}}
                            </div> 
                           <div class = "col-2">
                               Price: €{{number_format($item->price, 2)}}
                               </form>
                           </div>
                       </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class = "text-right">
                       <p> Subtotal: €{{Cart::subtotal()}}</p>
                       <p> Tax: €{{Cart::tax()}}</p>
                       <p> Total Price: €{{Cart::total()}}</p>
                       <hr> 
                    </div>
                    <div class = "d-flex justify-content-center d-flex align-items-center">
                        <div class = "col-2">
                            <p> Deliver to: </p>
                        </div>
                        <div class = "col-7">
                            <div class= "list-group-item">
                              {{$user->line1}} {{$user->line2}}, {{$user->city}} |  {{$user->postcode}}
                            </div>
                        </div>
                        <div class = "col-3">
                                <a href = "profile/{{$user->id}}/edit" class = "btn btn-link">Change address</a>
                        </div>
                    </div>
                    <hr>
                    <form name = "order" id = "order" action = "{{route('checkout.store')}}" method = "POST";>
                            {{ csrf_field() }}
                        <input type = "hidden" name = "customer_id" value = "{{$user->id}}">
                        <input type = "hidden" name = "total_price" value = "{{Cart::total()}}">    
                       
                        <button type ="submit" class = "btn-lg btn btn-success btn-block">Complete Order </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection