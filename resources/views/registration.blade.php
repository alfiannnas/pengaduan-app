<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/bg.png') no-repeat center center fixed;
            background-size: cover;
        }

        .blur-overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.3);
        }

        .form-box {
            background-color: #A30303;
            color: white;
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 25px;
            position: relative;
            z-index: 1;
        }

        h1 {
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px 40px 10px 12px;
            margin-top: 5px;
            border-radius: 15px;
            border: none;
            font-size: 16px;
            box-sizing: border-box;
        }

        .input-group {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .eye-icon img {
            width: 20px;
        }

        .btn-register {
            width: 100%;
            background-color: #00b140;
            color: white;
            font-weight: bold;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .btn-group button {
            width: 48%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            color: white;
        }

        .btn-back {
            background-color: #cc3333;
        }

        .btn-login {
            background-color: #3300cc;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .btn-secondary,
        .btn-primary {
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
    </style>
</head>

<body>
    <div class="blur-overlay"></div>

    <div class="form-box">
        <h1>REGISTRASI</h1>
        @if ($errors->any())
        <div class="message">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
        @endif
        <form method="POST" action="{{ route('registration') }}">
            @csrf
            <label>NIK</label>
            <input type="text" name="nik" placeholder="Masukkan NIK" required>

            <label>Nama Lengkap</label>
            <input type="text" name="name" placeholder="Masukkan Nama Lengkap" required>

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" required>

            <label>Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
                <span class="eye-icon" onclick="togglePassword('password', this)">
                    <img src="https://img.icons8.com/ios-filled/50/000000/closed-eye.png" />
                </span>
            </div>

            <label>Nomor Telepon</label>
            <div class="input-group">
                <input type="text" name="telephone" id="telephone" placeholder="Masukkan Nomor Telepon" required>
                <span class="eye-icon" onclick="togglePassword('telephone', this)">
                </span>
            </div>

            <button type="submit" class="btn-register">DAFTAR</button>

            <div class="btn-group">
                <a href="{{ url()->previous() }}" class="btn-secondary">Kembali</a>
                <a href="{{ route('login') }}" class="btn-primary">Login</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const img = el.querySelector('img');
            if (input.type === "password") {
                input.type = "text";
                img.src = "https://img.icons8.com/ios-filled/50/000000/visible--v1.png";
            } else {
                input.type = "password";
                img.src = "https://img.icons8.com/ios-filled/50/000000/closed-eye.png";
            }
        }
    </script>
</body>

</html>