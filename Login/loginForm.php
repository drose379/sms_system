<?php

$BasePath = BASEPATH;

$HTML = <<< HTML
<!doctype html>
<html>
<head>
</head>
<body>
    <h4>Login:</h4>
    <h4>{$info["error"]}</h4>
    <form action = '$BasePath/login/' method = 'POST'>
        Username: <input type='text' name='username'> <br>
        Password: <input type='password' name='password'> <br>
            <input type='submit'>
    </form>
</body>
</html>
    
HTML;
    
return $HTML;