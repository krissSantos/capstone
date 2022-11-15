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
<style>

    .tweet-button {
        background-color: rgb(2, 158, 255);
        color: black;
        border: none;
        height: 36px;
        width: 74px;
        border-radius: 18px;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
    }
</style>
    <title>orders</title>
</head>
<body>
<h1>orders</h1>
<form action="/orders/search" method="POST">
    @csrf
    <label for="">Search</label>
    <input type="text" name="search">
    <button type="submit">Search</button>
</form>
   <table class="table">
    <tr>
       <th>Order ID</th>
       <th>Clients Name</th>
       <th>Address</th>
       <th>Mobile Number</th>
       <th>Email Address</th>
       <th>Cardholder Name</th>
       <th>Credit Card Number</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{$order-> order_ID}}</td>
        <td>{{$order-> last_name}}, {{$order-> first_name}}</td>
        <td>{{$order-> address}}</td>
        <td>{{$order-> mobile_number}}</td>
        <td>{{$order-> email_address}}</td>
        <td>{{$order-> cardholder_name}}</td>
        <td>{{$order-> credit_card_number}}</td>
        <td>
            <a href="/orders/{{$order-> order_ID}}"><button class="tweet-button">Show</button></a>
            <a href="/orders/{{$order-> order_ID}}/edit"><button class="tweet-button" style="background-color: yellow">Edit</button></a>
            <form method="POST" action="/orders/{{$order-> order_ID}}">
            @csrf
            @method("DELETE")
            <button class="tweet-button" style="background-color: red" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
   </table>
   <a href="orders/create">Create New Class</a>
</body>
</html>