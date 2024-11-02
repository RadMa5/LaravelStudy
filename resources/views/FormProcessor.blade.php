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
                Book registration
            </div>
            <div class="cardbody">
                <form name="book-form" id="book-form" method="post" action="{{ url(path: '/store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nameform">Name</label>
                        <input name="nameform" id="nameform" type="text" class="formcontrol" required="true">
                        <label for="authorform">Author</label>
                        <input name="authorform" id="authorform" type="text" class="formcontrol" required="true">
                        <label for="genreform">Choose the genre: </label>
                        <select name="genreform" id="genreform">
                            <option value="fantasy">Fantasy</option>
                            <option value="sci-fi">Sci-fi</option>
                            <option value="drama">Drama</option>
                            <option value="mystery">Mystery</option>
                        </select>
                        <br>
                        
                    </div>
                    <button type="submit" class="brnform">Submit</button>
                </form>
                @foreach ($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>