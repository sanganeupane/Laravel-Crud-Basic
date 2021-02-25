<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Laravel CRUD</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Student Record</h1>
            <hr>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

        </div>
        <div class="col-md-8">
            <form action="{{route('edit-Action')}}" method="post">
                @csrf
                <input type="hidden" name="criteria" value="$userData->id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <a style="color: mediumvioletred">{{$errors->first('name')}}</a>
                    <input type="text" name="name" class="form-control" placeholder="First name" value="{{$userData->name}}"  id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <a style="color: mediumvioletred">{{$errors->first('email')}}</a>
                    <input type="text" name="email" class="form-control" placeholder="Your email" value="{{$userData->email}}" id="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <a style="color: mediumvioletred">{{$errors->first('phone')}}</a>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{$userData->phone}}" id="phone">
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-success">Edit Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
