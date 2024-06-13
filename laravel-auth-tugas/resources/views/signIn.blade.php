<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css"/>

</head>
<body>
    @if (session()->has('loginError'))
        <h2>{{session('loginError')}}</h2>
    @endif  {{--//memanggil fungsi dari AuthController loginError --}}

    @if (session()->has('success'))
        <h2>{{ session('success') }}</h2>
    @endif

    <form action="/login" method="POST">
        @csrf
        {{--untuk memblokir input data yang tidak dikenal/berbahaya dan menampilkan 419 post expired --}}
        <h1>Sign In</h1>
    <p class="subtitle">Masukkan akun kamu!</p>
        <div>
            <label for="email">Username</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label>Password</label>
            <input type="text" id="pw" name="password">
        </div>

    <p>Apakah kamu belum punya akun? <a href="/register">Daftar disini</a></p>

    <button type="submit">Submit</button>
    </form>

</body>
</html>
