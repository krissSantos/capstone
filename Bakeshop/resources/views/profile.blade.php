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
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <p>Welcome, {{Session::get('first_name')}}!</p>
    <ul>
        <li>ID: {{Session::get('id')}}</li>
        <li>Email: {{Session::get('email')}}</li>
        <li>Role: {{Session::get('role')}}</li>
    </ul>
    <p><a href="/logout">Logout</a></p>
</body>
</html>