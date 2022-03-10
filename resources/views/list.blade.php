<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="antialiased">
<div class="container">


    <form method="post" action="{{route('add')}}">
        @csrf
        <div class="mb-3">
            <label for="InputName" class="form-label">Email address</label>
            <input type="text" name="name" class="form-control" id="InputName">
        </div>
        <div class="mb-3">
            <label for="InputPrice" class="form-label">Password</label>
            <input type="number" name="price" class="form-control" id="InputPrice">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table">
        <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products ?? [] as $product)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
