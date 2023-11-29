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


        </div>
    </div>

    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <div class="mb-3">
            <h3 style="color: #fdc654;font-weight: 600;font-size: 20px; margin-top: 15px" class="w-100 text-center">MARK</h3>
            <label for="exampleInputEmail1"  class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="w-[100%] d-flex justify-content-end">
            <button type="submit" class="btn btn-warning">Login</button>
        </div>
    </form>

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
