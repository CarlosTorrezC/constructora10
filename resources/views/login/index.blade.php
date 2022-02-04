<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row m-0 justify-content-center align-items-center vh-100" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">               
                <br><br><br><br>
                <form action="{{ route('login.check') }}" method="POST" role="form">
                    @csrf
                    <div class="results">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" required class="form-control" autocomplete="off" name="email" placeholder="Email">                        
                    </div>
                    <div class="form-group">
                        <label for="password"> Contraseña </label>
                        <input type="password" required class="form-control" autocomplete="off" name="password" placeholder="Contraseña">                        
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary"> Ingresar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
