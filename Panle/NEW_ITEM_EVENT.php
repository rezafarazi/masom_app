<?php
include "Check.php";

$Title=$_POST['TITLE_NEW_ITEM'];
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
    $Address = "uploads/image_ITEMs/" . NEW_ITEM_NAME() . "." . $bannerexptype;
    $bannerpath = "../" . $Address;
    move_uploaded_file($_FILES["IMAGE_FILE_NEW_ITEM"]["tmp_name"], $bannerpath);
}


try
{
    if(strtolower($_POST['visible_flag'])=="on")
    {
        $visible_flag = $_POST['visible_flag'];
        $visible_flag = 1;
    }
    else
    {
        $visible_flag=0;
    }
}
catch (Exception $Err)
{
    $visible_flag=0;
}

$user_name=$_SESSION['Username'];

echo "Salam";

INSERT_TO_ITEMS_MENU($Title, $Address, $user_name, $visible_flag);






echo "<script> window.location = 'Panle.php#new_item'; </script>";




?>
