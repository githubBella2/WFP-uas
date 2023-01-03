<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <title>Login</title>
    <style>
        body {
            margin: 0;
            color: #C1AAC6;
            background: #0be6f4;
            font-family: 'Montserrat', monospace;
            font-weight: bold;
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        .clearfix:after,
        .clearfix:before {
            content: '';
            display: itemle
        }

        .clearfix:after {
            clear: both;
            display: block
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .container {
            width: 100%;
            margin: auto;
            margin-top: 5%;
            max-width: 525px;
            min-height: 700px;
            position: relative;
            box-shadow: 0 12px 15px 0  rgba(11,230,244,255), 0 17px 50px 0  rgba(11,230,244,255);
           
        }

        .login-container {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 70px 70px 50px 70px;
            background: #131315;
        }

        .login-container .sign-in-htm,
        .login-container .sign-up-htm {
            top: 20%;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all .4s linear;
        }

        .login-container .sign-up-htm {
            top: 10%;
        }

        .login-container .sign-in,
        .login-container .sign-up,
        .login-form .group .check {
            display: none;
        }

        .login-container .item,
        .login-form .group .label,
        .login-form .group .button {
            text-transform: uppercase;
        }

        .login-container .item {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent;
            cursor: pointer;
        }

        .login-container .sign-in:checked+.item,
        .login-container .sign-up:checked+.item {
            color: #fff;
            border-color: #DF00FF;
        }

        .login-form {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .login-form .group {
            margin-bottom: 15px;
        }

        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #fff;
            display: block;
        }

        .button {
            cursor: pointer;
        }

        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group input[data-type="password"] {
            text-security: circle;
            -webkit-text-security: circle;
        }

        .login-form .group .label {
            color: #aaa;
            font-size: 12px;
        }

        .login-form .group .button {
            background: #DF00FF;
        }

        .login-form .group .check:checked+label {
            color: #fff;
        }

        .login-container .sign-in:checked+.item+.sign-up+.item+.login-form .sign-in-htm {
            transform: rotate(0);
        }

        .login-container .sign-up:checked+.item+.login-form .sign-up-htm {
            transform: rotate(0);
        }

        .hr {
            height: 2px;
            margin: 30px 0 20px 0;
            background: rgba(255, 255, 255, .2);
        }

        .footer {
            text-align: center;
        }
    </style>
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="container">
        <div class="login-container">
            <input id="item-1" type="radio" name="item" class="sign-in" checked><label for="item-1"
                class="item">Sign In</label>
            <input id="item-2" type="radio" name="item" class="sign-up"><label for="item-2"
                class="item">Sign Up</label>
                
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="group">
                            <input placeholder="Username" id="user" type="text" class="input" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="group">
                            <input placeholder="Password" id="pass" type="password" name="password" required
                                autocomplete="current-password" class="input" data-type="password">
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                    </form>
                    <div class="hr"></div>
                    <div class="footer">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="sign-up-htm">

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="group">
                                    <input placeholder="Enter first name" id="pass" name="fname" type="text"
                                        class="input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">
                                    <input placeholder="Enter last name" id="pass" name="lname" type="text"
                                        class="input">

                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <input placeholder="Email adress" name="email" type="email" aria-describedby="emailHelp" id="pass" class="input">
                            @error('email')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="group">
                            <input placeholder="Password" id="password" name="password" type="password" class="input"
                                data-type="password" required autocomplete="new-password" @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="group">
                            <input placeholder="Repeat password" name="password_confirmation" autocomplete="new-password" id="password-confirm" type="password" class="input"
                                data-type="password">
                        </div>

                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                    </form>
                    <div class="hr"></div>
                    <div class="footer">
                        <label for="item-1">Already have an account?</a>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
