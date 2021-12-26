<?php
include "Check.php";

$Title=$_POST['TITLE_NEW_POST'];
$CAT_ID=$_POST['COMBO_NEW_POST'];
$HTML_CODES=strval($_POST['CONTENT_NEW_POST']);
$Address="";

$file="";

try
{
    $banner = $_FILES['IMAGE_FILE_NEW_POST']['name'];
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
    $banner = $_FILES['IMAGE_FILE_NEW_POST']['name'];
    $expbanner = explode('.', $banner);
    $bannerexptype = $expbanner[1];
    $date = date('m/d/Yh:i:sa', time());
    $rand = rand(10000, 99999);
    $encname = $date . $rand;
    $bannername = md5($encname) . '.' . $bannerexptype;
    $Address = "uploads/image_POSTs/" . NEW_POST_NAME() . "." . $bannerexptype;
    $bannerpath = "../" . $Address;
    move_uploaded_file($_FILES["IMAGE_FILE_NEW_POST"]["tmp_name"], $bannerpath);
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



$HTML_CODE=HTML_Encrypt($HTML_CODES);



INSERT_TO_CONTENT($Title,$Address,$HTML_CODE,$CAT_ID,$date,$user_name,$visible_flag);




echo "<script> window.location = 'Panle.php#new_post'; </script>";


?>
