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
    <title>My Orders</title>
</head>
<body>
    <h1>My Order</h1>
    <ul>
        <li>Customer ID: {{$orders[0] -> customer_ID}}</li>
        <li>Order placed: {{$orders[0] -> time_placed}}</li>
        <li>Status: {{$orders[0] -> status}}</li>
    </ul>

    <table class="table">
        @foreach ($orders as $order)
            <tr>
            <td>{{$order -> product_name}}</td>
                <td>₱{{$order -> price}}</td>
                <td>{{$order -> quantity}}</td>
                <td>
                <img  src="{{url('/images/')}}/{{$order->image }}" height="100px" width="100px" />
                </td>
            </tr>
        @endforeach
    </table>
    <p>Total: ₱{{$totals[0] -> total}}</p>
</body>
</html>