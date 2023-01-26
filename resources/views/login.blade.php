<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU`auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body,
        html {
            height: 100%;
        }

        input {
            margin: 1em 0;
        }
    </style>
</head>

<body>
    <div class="container h-75">
        <div class="row align-items-center h-75">
            <div class="card text-center p-3 flex d-flex" style="max-width:480px;margin:auto;">
                <div class="card-body" >
                    <form method="post">
                        {{ csrf_field() }}
                        <h1 class="h3 mb-3 font-weight-normal">Masuk</h1>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-2" formaction="/postlogin">Login</button>
                    </form>
                </div>
                @if (session()->has('login_message'))
                    <div class="alert alert-danger">
                        {{ session('login_message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>