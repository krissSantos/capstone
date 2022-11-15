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
</head>
<body>
    @foreach ($orders as $order)
    <h1>Order # {{$order-> order_ID}}</h1>
    <ul>
        <li>Clients Name: {{$order-> schedule}}</li>
        <li>Products: {{$order-> room}}</li>
        <li>Total: {{$order-> subject_id}}</li>
    </ul>
    <a href="/orders">Go to back to orders</a>
    @endforeach
</body>
</html>