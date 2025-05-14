<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registrasi</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
        body {
            background: url('images/bg.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: #A30303;
            padding: 40px;
            width: 350px;
            margin: 100px auto;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
            color: white;
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 16px;
        }
        .btn-login {
            background: #00b140;
            color: white;
            padding: 12px;
            width: 95%;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-login:hover {
            background: #009933;
        }
        .btn-group {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .btn-secondary, .btn-primary {
            width: 41%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            color: white;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .btn-secondary {
            background: #cc3333;
        }
        .btn-primary {
            background: #3300cc;
        }
        .error {
            color: #ffcccb;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: rgba(255, 0, 0, 0.1);
        }
        .message {
            color: #90EE90;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: rgba(0, 255, 0, 0.1);
        }
        .alert {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const errorMessage = "{{ session('error') }}";
                const successMessage = "{{ session('success') }}";
                
                if (errorMessage) {
                    document.querySelector('.error').classList.add('alert');
                }
                if (successMessage) {
                    document.querySelector('.message').classList.add('alert');
                }
            });
        </script>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
    <div class="login-container">
        <h1>LOGIN</h1>
        @if($message = session('error'))
            <div class="error">{{ $message }}</div>
        @elseif($message = session('success'))
            <div class="message">{{ $message }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label style="float: left; margin-left: 20px;">Username</label><br>
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>
            <div>
                <label style="float: left; margin-left: 20px;">Password</label><br>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="btn-login">LOGIN</button>
            <div class="btn-group">
                <a href="{{ url()->previous() }}" class="btn-secondary">Kembali</a>
                <a href="{{ route('registration') }}" class="btn-primary">Registrasi</a>
            </div>
        </form>
    </div>
</body>
</html>
