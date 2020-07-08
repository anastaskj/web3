@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Admin Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <hr>
                    <p>
                        <a href = "{{ url('food/create/') }}" class="btn-lg btn btn-primary btn-block">Add a product</a>
                    </p>
                    <p>
                            <a href = "{{ route('excel.export') }}" class="btn-lg btn btn-primary btn-block">Export Excel Product Spreadsheet</a>
                    </p>
                    <hr>
                    @if($orders->count()>0)
                    <p>List of orders currently in transit: </p>
                    @foreach ($orders as $order)
                        @if($order->completed == 0)
                            <div class = "list-group-item">
                                <div class = row>
                                    <div class = "col-md-9">
                                        Status: In transit | Total price: €{{$order->total_price}} | Ordered on: {{$order->created_at}} 
                                    </div>
                                    <div class ="col-md-3">
                                        <form name = "print" id = "print" action = "{{route('receipt.print')}}" method = "POST";>
                                                {{ csrf_field() }}
                                            <input type = "hidden" name = "order_id" value = "{{$order->order_id}}">
                                            <input type = "hidden" name = "customer_id" value = "{{$order->customer_id}}">
                                            <button type ="submit" class = "btn btn-primary">Generate Receipt </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @else
                    <p>There are no orders in transit.</p>
                    @endif
                    <hr>

                {{-- Link for delivery management

                User stats? --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
