<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <h1>Sign Up</h1>
    <p class="subtitle">Buat akun kamu!</p>

        <div>
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="name" value="{{ old('name') }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="pw">Password</label>
            <input type="password" id="pw" name="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirm">Confirm Password</label>
            <input type="password" id="password_confirm" name="password_confirmation" required>
        </div>

        <button type="submit">Daftar</button>
    </form>

</body>
</html>
