<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form</title>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="cardheader">
                Registration
            </div>
            <div class="cardbody">
                <form name="addform" id="addform" method="post" action="{{ url('/store_form') }}">
                    @csrf
                    <div class="formgroup">
                        <label for="nameform">Name</label>
                        <input name="nameform" id="nameform" type="text" class="formcontrol" required="">
                        <label for="surnameform">Surname</label>
                        <input name="surnameform" id="surnameform" type="text" class="formcontrol" required="">
                        <label for="emailform">Email</label>
                        <input type="email" name="emailform" id="emailform" class="formcontrol" required="">
                    </div>
                    <button type="submit" class="brnform">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>