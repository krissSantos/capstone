<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <title>Bakeshop Cart</title>
</head>
<body>
    <form action="/Menu/checkout" method="POST">
        @csrf

        <h1>Total order is ₱{{$total}}</h1>
        <ul>
            @for ($i = 0; $i < count($products); $i++)
                @if ($request -> input('order_' . $products[$i] -> product_ID) > 0)
                    <li>{{$products[$i] -> product_name}}: {{$request -> input('order_' . $products[$i] -> product_ID)}}</li>
                    <li>{{$products[$i]->price * $request -> input('order_' . $products[$i] -> product_ID)}}</li>
                @endif
                <input
                name="order_{{$products[$i]->product_ID}}"
                value="{{$request -> input('order_' . $products[$i] -> product_ID)}}"
                hidden
                />
            @endfor
            <button type="submit">Place order</button>
        </ul>
    </form>
</body>
</html>