<?php

$BasePath = BASEPATH;

$HTML = <<< HTML
<!doctype html>
<html>
<head>
</head>
<body>
    <h4>Please register before sending messages</h4>
    <h4>{$info["error"]}</h4>
    <h4>If you have already registered, <a href='$BasePath/loginscreen'>please sign in</a></h4>
    <form action = '$BasePath/register/user' method = 'POST'>
        First Name: <input type='text' name='firstName' /> <br>
        Last Name: <input type='text' name='lastName' /> <br>
        Username: <input type='text' name='username' /> <br>
        Password: <input type='password' name='password' /> <br>
        E-Mail: <input type='email' name='email' /> <br>
            <input type='submit' />
    </form>
</body>
</html>
    
HTML;
    
return $HTML;