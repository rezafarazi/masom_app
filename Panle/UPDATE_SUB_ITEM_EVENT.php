<?php
include "Check.php";

$ID=$_POST['COMBO_UPDATE_POST'];
$TITLE=$_POST['TITLE_UPDATE_SUB_ITEM'];
$CAT=$_POST['COMBO_UPDATE_ITEM'];

$Address="";
$file="";

try
{
    $banner = $_FILES['IMAGE_FILE_UPDATE']['name'];
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
    $banner = $_FILES['IMAGE_FILE_UPDATE']['name'];
    $expbanner = explode('.', $banner);
    $bannerexptype = $expbanner[1];
    date_default_timezone_set('Australia/Melbourne');
    $date = date('m/d/Yh:i:sa', time());
    $rand = rand(10000, 99999);
    $encname = $date . $rand;
    $bannername = md5($encname) . '.' . $bannerexptype;
    $Address = "uploads/image_SUB_ITEMs/" . NEW_SUB_ITEM_NAME() . "." . $bannerexptype;
    $bannerpath = "../" . $Address;
    move_uploaded_file($_FILES["IMAGE_FILE_UPDATE"]["tmp_name"], $bannerpath);

    if(isset($_POST['visible_flag']))
    {
        if($_POST['visible_flag']=="on")
        {
            UPDATE_ITEMS_MENU2($ID,$TITLE,$Address,$CAT,"1");
        }
        else
        {
            UPDATE_ITEMS_MENU2($ID,$TITLE,$Address,$CAT,"");
        }
    }
    else
    {
        UPDATE_ITEMS_MENU2($ID,$TITLE,$Address,$CAT,"");
    }
}
else
{
    if(isset($_POST['visible_flag']))
    {
        if($_POST['visible_flag']=="on")
        {
            UPDATE_ITEMS_MENU2($ID,$TITLE,"",$CAT,"1");
        }
        else
        {
            UPDATE_ITEMS_MENU2($ID,$TITLE,"",$CAT,"");
        }
    }
    else
    {
        UPDATE_ITEMS_MENU2($ID,$TITLE,"",$CAT,"");
    }
}



header("location:Panle.php#update_sub_item");


?>
