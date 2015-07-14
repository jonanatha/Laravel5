<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Register Account</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
</head>

<body>
<div class="wrapper">
    <div class="container">
        <h1>Welcome to use our system</h1>
        <form action="<?= URL::to('/registerUser') ?>" class="form" method="post">
            <input type="text" name="name" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm" placeholder="Confirm Password">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input type="submit" class="btn btn-default" value="REGISTER NOW!">
            <br><br>
            <div class="form-group">
                <a class="btn btn-default" href="<?= URL::to('/') ?>" role="button">Sing IN</a>
            </div>
    </form>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{ URL::asset('js/index.js') }}"></script>
</body>
</html>
