<!DOCTYPE html>
<html>
<head>
    <title>Mail Preview</title>
</head>
<body style="font-family: Arial;">
    <h2>Hello {{ $user['name'] }} </h2>

    <p>
        This is a <strong>Laravel 12 Mail Preview</strong>.
    </p>

    <p>
        Email: {{ $user['email'] }}
    </p>

    <p>
        Thanks,<br>
        <strong>Laravel Team</strong>
    </p>
</body>
</html>
