<!doctype html>
<html>
    <head>
    </head>
    <body>
            <tr>
                <td>Product name</td>  
                <td>Product category</td> 
                <td>Product description</td> 
                <td>Product price</td> 
            </tr>
            @foreach($products as $product)
            <tr>
                    <td>{{$product->name}}</td>  
                    <td>{{$product->category}}</td> 
                    <td>{{$product->description}}</td> 
                    <td>{{$product->price}}</td> 
                </tr>
            @endforeach
    </body>
</html>
