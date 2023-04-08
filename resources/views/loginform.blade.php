<html lang="en">

<head>
    <title style="color: brown">Login Form</title>
    <meta name="author" content="Zaur">
    <meta descryption content="Presentation of website">
    <meta name="keywords" content="technology, cyber security, software">
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    <!-- <link rel="stylesheet" href="login.css"> -->
</head>

<body>
    <div class="container">
        <div class="header">Login</div>
        <form method="POST" action="{{route('check_login')}}">
            @csrf
            <div class="field input-field">
                <input type="email"  name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            
            <div class="field button-field">
                <button type="submit" >Login</button>
            </div>
            <!-- <div class="form-link sign-up">
                <span>Don't have an account?</span> <a href="#">Sign up now</a>
            </div> -->
        </form>
    </div>
</body>

</html>