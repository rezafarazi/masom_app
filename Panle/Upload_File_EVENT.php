<?php

include "Check.php";


$Address="";
$file="";

try
{
    $banner = $_FILES['IMAGE_FILE_NEW_ITEM']['name'];
    $expbanner = explode('.', $banner);

    if($expbanner[0]!="")
    {
        $file="YES";
    }
    else
    {
        $file="";
    }

}
catch (Exception $Err)
{
    $file=$Err->getMessage();
}


if($file!="")
{
    $banner = $_FILES['IMAGE_FILE_NEW_ITEM']['name'];
    $expbanner = explode('.', $banner);
    $bannerexptype = $expbanner[1];
    date_default_timezone_set('Australia/Melbourne');
    $date = date('m/d/Yh:i:sa', time());
    $rand = rand(10000, 99999);
    $encname = $date . $rand;
    $bannername = md5($encname) . '.' . $bannerexptype;
    $Address = "uploads/Files/" . NEW_UPLOAD_FILE_NAME() . "." . $bannerexptype;
    $bannerpath = "../" . $Address;
    move_uploaded_file($_FILES["IMAGE_FILE_NEW_ITEM"]["tmp_name"], $bannerpath);
}

echo "<script> window.location = 'Panle.php#upload'; </script>";

?>