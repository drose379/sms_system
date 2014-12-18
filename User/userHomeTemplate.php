<?php

$BasePath = BASEPATH;

$HTML = <<< HTML
<!doctype html>
<html>
<head>
</head>
<body>
<h4>You are logged in as</h4>
{$info["firstname"]} {$info["lastname"]}
<hr>
<p><a href='$BasePath/new/msg'>Send a message</a></p>
<p>My contacts</p>
</body>
</html>
    
HTML;
    
return $HTML;