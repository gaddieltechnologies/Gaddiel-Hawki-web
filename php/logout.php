<?php
session_start();
if(session_destroy())
{
header("Location: http://hawki.gaddieltech.com/php/index.php");
}
?>