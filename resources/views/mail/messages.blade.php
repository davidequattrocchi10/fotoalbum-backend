<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message</title>
</head>

<body>
    <h1>
        You received a new message from:
        {{$lead->name}}
    </h1>

    <p>
        Email:
        {{$lead->address}}

    </p>

    <p>
        Message:
        {{$lead->message}}

    </p>

</body>

</html>