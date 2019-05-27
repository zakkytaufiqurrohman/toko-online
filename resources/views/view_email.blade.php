<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verifikasi user</div>

                    <div class="card-body">
                        <center>
                         <p> for signing up!</p>
                         <p>Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                            </p>


                            <a href="{{route('verifikasi',$remember_token)}}"><p> Please click this link to activate your account:</p></a>
                </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
