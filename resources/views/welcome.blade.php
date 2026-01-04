<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

@if ($errors->any())
    <div style="color: red;">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <div>
        <label>Email</label><br>
        <input type="email" name="email" required>
    </div>

    <br>

    <div>
        <label>Password</label><br>
        <input type="password" name="password" required>
    </div>

    <br>

    <button type="submit">Login</button>
</form>

</body>
</html>
