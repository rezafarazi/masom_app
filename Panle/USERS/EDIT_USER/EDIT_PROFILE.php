<meta charset="UTF-8">
<?php

include "Check_PROFILE.php";



if(isset($_REQUEST['user_id']))
{
    $ID=$_REQUEST['user_id'];
    $QUARY = SELECT_BY_QUARY("SELECT * FROM users WHERE id=$ID;", "user~Name~Family~email~sex~image~enable_flag~permission~id~phone", "2");
    $QUARY_ARRAY = preg_split("/\~/", $QUARY);
}
else
{
    echo "<script> window.location='../../index.php'; </script>";
}


?>

<link rel="stylesheet" href="../../GUI/css/style.css" type="text/css">


<center style="padding: 25px;">



    <img src="../../../<?php echo $QUARY_ARRAY[5]; ?>" width="125px" height="125px" style="border-radius: 100%;" class="SHOWDOW"/>


    <form method="post" action="EDIT_PROFILE_EVENT.php" dir="rtl" enctype="multipart/form-data">
        <input type="text" value="<?php echo $_REQUEST['user_id']; ?>" name="id" style="display: none;"/>
        <br>
        <br>
        <input class="INPUT-TEXT" name="name" type="text" placeholder="نام کاربری جدید" value="<?php echo $QUARY_ARRAY[1]; ?>" />
        <input class="INPUT-TEXT" name="family_name" type="text" placeholder="نام کامل جدید" value="<?php echo $QUARY_ARRAY[2]; ?>"/>
        <br>
        <br>
        <input class="INPUT-TEXT" name="email" type="email" placeholder="ایمیل جدید" value="<?php echo $QUARY_ARRAY[3]; ?>"/>
        <input class="INPUT-TEXT" name="phone" type="text" placeholder="شماره موبایل جدید" value="<?php echo $QUARY_ARRAY[9]; ?>"/>
        <br>
        <br>
        <input class="INPUT-TEXT" name="password" type="password" placeholder="رمز جدید"/>
        <br>
        <br>
        <table class="TABLE">
            <tr><td><p>جنسیت</p></td></tr>
            <tr><td><input id="SEX_MAN" type="radio" value="مذکر" name="sex" />:مذکر</td></tr>
            <tr><td><input id="SEX_WOMAN" type="radio" value="مونث" name="sex"/>  :مونث</td></tr>
        </table>
        <br>
        <input class="INPUT-FILE" type="file" name="pro_file_image" accept="image/png image/jpeg"/>
        <br>
        <br>
        <br>
        <input type="submit" id="Submit_PANLE" value="اعمال تغییرات" />


    </form>

</center>

<style>

    td
    {
        text-align: center;
        padding: 0px 100px 0px 100px;
    }

    .INPUT-FILE
    {
        margin: 0px 50px 0px 50px;
    }

    .INPUT-TEXT
    {
        margin: 0px 15px 0px 15px;
    }

</style>


<script>

    <?php
    if($QUARY_ARRAY[4]==='مذکر')
    {
        echo "document.getElementById('SEX_MAN').checked=true";
    }
    else if($QUARY_ARRAY[4]==='مونث')
    {
        echo "document.getElementById('SEX_WOMAN').checked=true";
    }
    ?>


</script>

