<?php
function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $var;
}
function addHorizontal()
{
    echo '<br><hr><br>';
}
?>