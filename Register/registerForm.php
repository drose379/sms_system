<?php

$BasePath = BASEPATH;

$HTML = <<< HTML
<!doctype html>
<html>
<head>
</head>
<body>
    <form action = '$BasePath/register/user' method = 'POST'>
        First Name: <input type='text' name='firstName'> <br>
        Last Name: <input type='text' name='lastName'> <br>
        Password: <input type='password' name='password'> <br>
        E-Mail: <input type='email' name='email'> <br>
            <input type='submit'>
    </form>
</body>
</html>
    
HTML;
    
return $HTML;