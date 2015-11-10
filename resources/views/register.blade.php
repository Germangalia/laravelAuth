<!DOCTYPE html>
<html>
<head>
    <title>REGISTER</title>

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
<div class="container">
    <div class="content">
        <div class="title">REGISTER</div>

        <form method="post" action="{{ route('register.postRegister') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">User name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email_confirm">Email address:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password_confirm">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button id="register" type="submit" class="btn btn-default">Login</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>

        Ja tens usuari?
        <a id="login" href="{{ route('auth.login') }}">Login</a>
    </div>
</div>
</body>
</html>
