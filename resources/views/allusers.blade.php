<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>
</head>
<body>
    @foreach ($emps as $emp)
    {{$emp["id"]}}. {{$emp["Name"]}} {{$emp["Surname"]}}. Position: {{$emp["Position"]}}. Mail: {{$emp["Email"]}}
    <br>
    @endforeach
</body>
</html>