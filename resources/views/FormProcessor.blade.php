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
                <form name="employee-form" id="employee-form" method="post" action="{{ url(path: '/store_form') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nameform">Name</label>
                        <input name="nameform" id="nameform" type="text" class="formcontrol" required="true">
                        <label for="surnameform">Surname</label>
                        <input name="surnameform" id="surnameform" type="text" class="formcontrol" required="true">
                        <label for="positionform">Position</label>
                        <input type="text" name="positionform" id="positionform" class="formcontrol" required="true">
                        <label for="emailform">Email</label>
                        <input type="email" name="emailform" id="emailform" class="formcontrol" required="true">
                        <br>
                        
                    </div>
                    <button type="submit" class="brnform">Submit</button>
                </form>
                <form name="jsonform"  method="post" action="{{ url(path: '/store_form_json') }}">
                    @csrf
                    <textarea maxlength="5000" name="textarea" rows="20" cols="50"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>