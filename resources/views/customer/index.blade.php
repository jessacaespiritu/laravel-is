@include('partials.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <title>Customer</title>
</head>
<body>
@if(Session::has('success'))
  {{Session::get('success')}}
  @endif

        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach ($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>

      <td>{{$customer->firstName}}</td>
      <td>{{$customer->lastName}}</td>
      <td>{{$customer->email}}</td>
      <td>{{$customer->contactNumber}}</td>
      <td>{{$customer->address}} </td>
      <td><a href="#"><button type="button" class="btn btn-primary">EDIT</button></td>
      <td><a href="delete/{{$customer->id}}"><button type="button" class="btn btn-danger">DELETE</button></td>
      @endforeach
    </tr>
    </tbody>
</table>

</body>
</html>
@include('partials.footer')
