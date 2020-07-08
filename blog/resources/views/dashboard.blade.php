@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to our online restaurant. 
                    
                    @if($orders->count()>0)
                    <p>Here is an overview of your orders: </p>
                    <hr>
                    @foreach ($orders as $order)
                        @if($order->completed == 0)
                        <form action = "{{route('orders.update', $order->order_id)}}" method = "POST">
                                {{ csrf_field() }}
                                 {{ method_field('PUT')}}
                            <div class = "list-group-item">
                                    Status: In transit | Total price: €{{$order->total_price}} | Ordered on: {{$order->created_at}}  
                            <button type = "submit" class = "btn btn-primary">Confirm Delivery</button>
                            </div>
                        </form>
                        @elseif($order->completed == 1)
                        <div class = "list-group-item">Status: Delivered | Total price: €{{$order->total_price}} | Ordered on: {{$order->created_at}} | Delivered on: {{$order->updated_at}}</div>
                        @endif
                    @endforeach
                    
                    @else
                    <p>You have no orders! <a href = "{{ url('/food') }}">Check out our dishes.</a> </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
