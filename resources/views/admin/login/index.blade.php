<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | E.S</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('_assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('_assets/css/admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition sidebar-mini">


<div class="login-card" style="width: 100%; height: 100%; display: flex;justify-content: center;align-items: center">
    <div class="login-card-content">
        <div class="header">

            <h3 style="color: #fdc654;font-weight: 600;font-size: 20px; margin-top: 15px">MARK</h3>
        </div>
        <form  action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="form">
                <div class="form-field username">
                    <div class="icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <input name="email" type="text" placeholder="Email">
                </div>
                <div class="form-field password">
                    <div class="icon">
                        <i class="fas fa-eye" id="showp" style="cursor:pointer;"></i>
                    </div>
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <input id="password" name="password" type="password" placeholder="Password">
                </div>

                <button type="submit">Login</button>
            </div>
        </form>
    </div>

</div>

<script>
    var showp = document.getElementById("showp");
    var passwordInput = document.getElementById("password");

    showp.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });


</script>
</body>
</html>
