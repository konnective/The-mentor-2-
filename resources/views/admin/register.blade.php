<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('assets/main-logo.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- / --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }
    </script>
    <title>Code Cube Login</title>
</head>
<style>
    /* body {
        background-color: #912d2d;
    } */

    .login_wrapper {
        width: 100vw;
        height: 100vh;
        background-color: teal;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .login_container {
        width: 25%;
        padding: 20px;
        background-color: white;
    }
    h1{
        padding:10px 0px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form input {

        flex: 1;
        min-width: 40%;
        margin: 10px 0;
        padding: 10px;

    }

    .btn_login {
        width: 40%;
        border: none;
        padding: 15px 20px;
        background-color: teal;
        color: white;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .btn_login:hover {
        background-color: rgb(33, 54, 54);
    }
</style>


<body class="login_body">
    <div class="login_wrapper">
        <div class="login_container">
            <h1>Register</h1>
            <form method="POST" action="{{ route('registration') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="text" placeholder="name" name="name" />
                <input type="text" placeholder="username" name="username" />
                <input type="password" placeholder="password" class="input_login" name="password" />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button class="btn_login">
                    Register
                </button>
            </form>
        </div>
    </div>
</body>

</html>
