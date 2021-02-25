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
            <h1>Students Record</h1>
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
        <div class="col-md-4">
            <form action="{{route('insert')}}" method="post">
                @csrf
                <div class="form-group">
                        <label for="name">Name</label>
                    <a style="color: mediumvioletred">{{$errors->first('name')}}</a>
                    <input type="text" name="name" class="form-control" placeholder="First name" value="{{old('name')}}"  id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <a style="color: mediumvioletred">{{$errors->first('email')}}</a>
                    <input type="text" name="email" class="form-control" placeholder="Your email" value="{{old('email')}}" id="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <a style="color: mediumvioletred">{{$errors->first('phone')}}</a>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{old('phone')}}" id="phone">
                </div>
<br>
                <div class="form-group">
                    <button class="btn btn-success">Add Record</button>
                      </div>
            </form>
        </div>

        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone No.</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($usersData as$key=>$user)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <a href="{{route('edit').'/'.$user->id}}"  class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('delete').'/'.$user->id}}"  class="btn btn-danger btn-sm">Delete</a>

                    </td>


                </tr>
                @endforeach
                </tbody>

            </table>
            {{$usersData->Links()}}
        </div>
    </div>
</div>
</form>
</body>

</html>
