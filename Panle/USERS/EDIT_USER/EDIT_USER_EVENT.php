<?php

include "Check.php";






function NEW_UPLOAD_IMAGE_USER()
{
    $myfile = fopen("../../../uploads/Image_User/Upload_Name_Image_User.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../../../uploads/Image_User/Upload_Name_Image_User.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}




$address="";




$File_Name="";



try
{
    $File_Name = $_FILES["pro_file_image"]["tmp_name"];
}
catch (Exception $ERR)
{

}

$file="";

try
{
    $banner = $_FILES['pro_file_image']['name'];
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
    $banner=$_FILES['pro_file_image']['name'];
    $expbanner=explode('.',$banner);
    $bannerexptype=$expbanner[1];
    date_default_timezone_set('Australia/Melbourne');
    $date = date('m/d/Yh:i:sa', time());
    $rand = rand(10000, 99999);
    $encname = $date . $rand;
    $bannername = md5($encname) . '.' . $bannerexptype;
    $address="/uploads/Image_User/".NEW_UPLOAD_IMAGE_USER().".".$bannerexptype;
    $bannerpath="../../../".$address;
    move_uploaded_file($_FILES["pro_file_image"]["tmp_name"],$bannerpath);
}



$id=$_POST['id'];
$name=$_POST['name'];
$family_name=$_POST['family_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$sex=$_POST['sex'];
$user_enabled=$_POST['user_enabled'];

$permission="";
if(isset($_POST['user_type']))
{
    $permission = $_POST['user_type'];
}



UPDATE_USER_DETALES($id,$name,$family_name,$email,$phone,$password,$sex,$user_enabled,$address,$permission);




echo "<script>window.close();</script>";




?>





