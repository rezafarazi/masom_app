<?php
include "Check.php";

$ID=$_POST['COMBO_UPDATE_POST'];
$HTML_CODE=$_POST['CONTENT_UPDATE_POST'];
$TITLE=$_POST['TITLE_UPDATE_POST'];
$CAT=$_POST['COMBO_UPDATE_POST_SUB_ITEM'];
$HTML_CODE=HTML_Encrypt($HTML_CODE);


$file="";

try
{
    $banner = $_FILES['IMAGE_FILE_UPDATE_POST']['name'];
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
    $banner = $_FILES['IMAGE_FILE_UPDATE_POST']['name'];
    $expbanner = explode('.', $banner);
    $bannerexptype = $expbanner[1];
    date_default_timezone_set('Australia/Melbourne');
    $date = date('m/d/Yh:i:sa', time());
    $rand = rand(10000, 99999);
    $encname = $date . $rand;
    $bannername = md5($encname) . '.' . $bannerexptype;
    $Address = "uploads/image_POSTs/" . NEW_POST_NAME() . "." . $bannerexptype;
    $bannerpath = "../" . $Address;
    move_uploaded_file($_FILES["IMAGE_FILE_UPDATE_POST"]["tmp_name"], $bannerpath);

    if(isset($_POST['visible_flag']))
    {

        if($_POST['visible_flag']=="on")
        {
            UPDATE_CONTENT($ID,$TITLE,$Address,$HTML_CODE,$CAT,"",1);
        }
        else
        {
            UPDATE_CONTENT($ID,$TITLE,$Address,$HTML_CODE,$CAT,"","");
        }

    }
    else
    {
        UPDATE_CONTENT($ID,$TITLE,$Address,$HTML_CODE,$CAT,"","");
    }

}
else
{
    if(isset($_POST['visible_flag']))
    {

        if($_POST['visible_flag']=="on")
        {
            UPDATE_CONTENT($ID,$TITLE,"",$HTML_CODE,$CAT,"",1);
        }
        else
        {
            UPDATE_CONTENT($ID,$TITLE,"",$HTML_CODE,$CAT,"","");
        }

    }
    else
    {
        UPDATE_CONTENT($ID,$TITLE,"",$HTML_CODE,$CAT,"","");
    }
}



header("location:Panle.php#update_post");


?>
