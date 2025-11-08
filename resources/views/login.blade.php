<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | PT Supra Uniland Utama</title>
    <link rel="icon" type="image/png" href="{{ asset('dist/img/uniland_logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('{{ asset('dist/img/uniplaza.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            animation: fadeIn 2s ease-in;
        }

        .login-overlay {
            height: 100%;
            width: 100%;
            background-color: rgba(70, 139, 145, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            animation: slideIn 1s ease-out forwards;
            transform: translateX(-100%);
        }

        .login-box {
            color: white;
            padding: 40px 30px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .login-box img {
            width: 130px;
            height: 130px;
            object-fit: contain;
            border-radius: 50%;
            background-color: white;
            padding: 10px;
            margin-bottom: 20px;
        }

        .login-box h2 {
            margin-bottom: 30px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .login-box form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            background-color: #d3d3d3;
            border-radius: 5px;
        }

        .login-box form button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .login-box .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #f0f0f0;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            to { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="login-overlay">
        <div class="login-box">
            <img src="{{ asset('dist/img/uniland_logo.png') }}" alt="Logo">
            <h2>LOGIN</h2>
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
            </form>
            <div class="footer">
                &copy; Supra Uniland Utama 2024. All Rights Reserved.
            </div>
        </div>
    </div>
</body>
</html>