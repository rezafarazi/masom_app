<?php

include "Check.php";

session_start();

$Flag=$_SESSION['DELETE_FILE'];

$File_Name=$_REQUEST['file_name'];

if($Flag==1)
{
    unlink("../uploads/Files/$File_Name");
}

echo "<script> window.location = 'Panle.php#upload'; </script>";

?>