<?php

$BasePath = BASEPATH;

$HTML = <<< HTML
<!doctype html>
<html>
<head>
</head>
<body>
    <form action = '$BasePath/login/' method = 'POST'>
        Email: <input type='email' name='email'> <br>
        Password: <input type='password' name='password'> <br>
            <input type='submit'>
    </form>
</body>
</html>
    
HTML;
    
return $HTML;