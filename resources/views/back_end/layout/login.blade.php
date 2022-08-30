<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-style: 16px;
        }

        body {
            background-image: linear-gradient(45deg, #00d2ff, #928dab);
            width: 100vw;
            height: 100vh;
        }

        #login {
            position: fixed;
            display: block;
            left: 50%;
            top: 30%;
            transform: translate(-50%, -30%);
            transition: all 0.5s;
            border: 1px solid #000;
            min-height: 200px;
            min-width: 300px;
            padding: 15px;
            border-radius: 10px;
            background-image: linear-gradient(45deg, #00d2ff, #928dab);
            color: white;
            box-shadow: #000 5px 5px 5px;
        }

        .form-group {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        .form-group input {
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            padding: 10px 10px;
            transition: all 0.5s;
            width: calc(100% - 20px);
        }

        .form-group input:focus {
            outline: none;
            border-color: coral;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;

        }

        .form-group button {
            margin: 15px auto;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            background: none;
            outline: none;
            color: white;
            transition: all 0.3s;
            box-shadow: #000 5px 5px 5px;
        }

        .form-group button:focus {
            box-shadow: none;
        }


        .error {
            box-shadow: #000 5px 5px 5px;
            width: max-content;
            border: red 1px solid;
            border-radius: 5px;
            margin: auto;
            text-align: center;
            padding: 10px;
            margin-bottom: 5px;
            display: block;
        }

        .form-group.error input {}

        .form-group.error label {}

        .form-group .error-mess {}
    </style>
</head>

<body>
    <div id="login">
        <div style="text-align: center; font-size: 20px; font-weight: bold; margin: 15px 0;">
            WELCOME
        </div>
        @if (session('thongbao'))
        <div class="error">{{ session('thongbao') }}</div>
        @endif

        <form action="{{ action('UserController@login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text" name="username" id="username" autocomplete="off">
                @if ($errors->get('username'))
                @foreach ($errors->get('username') as $error)
                <span class="error">
                    {{ $error }}
                </span>
                @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password">
                @if ($errors->get('password'))
                @foreach ($errors->get('password') as $error)
                <span class="error">
                    {{ $error }}
                </span>
                @endforeach
                @endif
            </div>
            <div class="form-group">
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>

</html>
