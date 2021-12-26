<?php

include "Check.php";

$banner=$_FILES['IMAGE_FILE_UPDATE']['name'];
$expbanner=explode('.',$banner);
$bannerexptype=$expbanner[1];
$Address="GUI/img/ic".".".$bannerexptype;
$bannerpath="../".$Address;
move_uploaded_file($_FILES["IMAGE_FILE_UPDATE"]["tmp_name"],$bannerpath);
echo "<script> window.location = 'Panle.php#profile'; </script>";

?>