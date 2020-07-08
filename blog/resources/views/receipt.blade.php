<!doctype html>
<html>
    <head>
    </head>
    <body>
            <div>
                <p><h1>Receipt</h1></p>
                    <hr>
                <p><h3>FROM:</h3></p>
                    <p><strong>Deliver inc</strong></p>
                    <p>Email: deliver@deliver.com</p>
                    <p>Phone: +81 093 328 91</p>
                        <hr>
                <p><h3>TO:</h3></p>
                    <p><strong>{{$user->name}}</strong></p>
                    <p>Email: {{$user->email}}</p>
            </div>
            <div>
                <p><strong>Receipt Date: {{date('Y-m-d')}}</strong></p>
            </div>
            <hr>
            @if($order->completed == 0)
                <div class = "list-group-item">
                    <h3>Ordered on: {{$order->created_at}}</h3>
                </div>
                <div class = "list-group-item">
                    <h3>Total price: €{{ number_format($order->total_price, 2)}}</h3>
                </div>
            @endif
            <hr>
            <p><h4>Thank you for your order.</h4></p>
            <p><h2>Payment Terms and Methods</h2></p>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat ante vitae ex convallis, nec semper odio tincidunt. Sed id justo vulputate, molestie erat quis, iaculis lorem.</p>
    </body>
</html>
