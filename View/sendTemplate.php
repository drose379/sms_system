<?php

$Basepath = BASEPATH;

$HTML = <<< HTML
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h4><a href='$Basepath/new/user'>Register</a> to create your own directory</h4>
    <form action = '$Basepath/new/msg' method='POST'>
       Phone Number: <input type='tel' name='tel' /> <br>
       Please select recipients carrier: <select name='carrier'>
            <option value='Verizon'>Verizon</option>
            <option value='AT&amp;T'>AT&amp;T</option>
            <option value='Sprint'>Sprint</option>
            <option value='Metro PCS'>Metro PCS</option>
        </select> <br>
       Message: <br> <textarea name='message'></textarea> <br>
        <input type='submit' value='Send' />
    </form>
</body>
</html>
    
HTML;

return $HTML;
