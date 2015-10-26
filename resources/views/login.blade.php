<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<h1>Login</h1>
<form method="post" action="{{route('auth.postLogin')}}">
    {!! csrf_field() !!}
    <div class="container">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" mame="email">

        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="email" mame="password">

        </div>
        <button type="submit" class="btn btn-default">login</button>
        <button type="reset" class="btn btn-default">reset</button>

    </div>
    </div>
</form>
</body>
</html>
