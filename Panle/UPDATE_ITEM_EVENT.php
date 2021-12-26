<?php
include "Check.php";

$ID=$_POST['COMBO_UPDATE_ITEM'];
$TITLE=$_POST['TITLE_UPDATE_ITEM'];

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
    $banner=$_FILES['IMAGE_FILE_UPDATE']['name'];
    $expbanner=explode('.',$banner);
    $bannerexptype=$expbanner[1];
    date_default_timezone_set('Australia/Melbourne');
    $date = date('m/d/Yh:i:sa', time());
    $rand=rand(10000,99999);
    $encname=$date.$rand;
    $bannername=md5($encname).'.'.$bannerexptype;
    $Address="uploads/image_ITEMs/".NEW_ITEM_NAME().".".$bannerexptype;
    $bannerpath="../".$Address;
    move_uploaded_file($_FILES["IMAGE_FILE_UPDATE"]["tmp_name"],$bannerpath);


    if(isset($_POST['visible_flag']))
    {
        if($_POST['visible_flag']=="on")
        {
            UPDATE_ITEMS_MENU($ID,$TITLE,$Address,"1");
        }
        else
        {
            UPDATE_ITEMS_MENU($ID,$TITLE,$Address,"");
        }
    }
    else
    {
        UPDATE_ITEMS_MENU($ID,$TITLE,$Address,"");
    }
}
else
{
    if(isset($_POST['visible_flag']))
    {
        if($_POST['visible_flag']=="on")
        {
            UPDATE_ITEMS_MENU($ID,$TITLE,"","1");
        }
        else
        {
            UPDATE_ITEMS_MENU($ID,$TITLE,"","");
        }
    }
    else
    {
        UPDATE_ITEMS_MENU($ID,$TITLE,"","");
    }
}


header("location:Panle.php#update_item");


?>
