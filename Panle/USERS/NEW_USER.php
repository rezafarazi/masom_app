<?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){echo "<script> window.location='../index.php'; </script>";} ?>

<center>


    <form method="post" action="USERS/NEW_USER_EVENT.php" dir="rtl" enctype="multipart/form-data">
        <input class="INPUT-TEXT" name="username" type="text" placeholder="نام کاربری" />
        <input class="INPUT-TEXT" name="email" type="email" placeholder="ایمیل"/>
        <br>
        <br>
        <input class="INPUT-TEXT" name="name" type="text" placeholder="نام"/>
        <input class="INPUT-TEXT" name="family" type="text" placeholder="نام خانوادگی"/>
        <br>
        <br>
        <input class="INPUT-TEXT" name="phone" type="text" placeholder="شماره موبایل"/>
        <input class="INPUT-TEXT" name="password" type="password" placeholder="رمز"/>
        <br>
        <br>
        <table class="TABLE">
            <tr><td><p>جنسیت</p></td><td><p>وضعیت کاربر</p></td></tr>
            <tr><td><label><input type="radio" value="مذکر" name="sex" />:مذکر</label></td><td><label><input type="radio" value="1" name="user_enabled" />:فعال</label></td></tr>
            <tr><td><label><input type="radio" value="مونث" name="sex"/>  :مونث</label></td><td><label><input type="radio" value="0" name="user_enabled"/>  :غیرفعال</label></td></tr>
        </table>
        <br>
        <input class="INPUT-FILE" type="file" name="pro_file_image" accept="image/png image/jpeg"/>
        <select class="INPUT-TEXT COMBOBOX" name="user_type">

            <option value="4">کاربر وب سایت</option>
            <option value="3">نویسنده</option>
            <option value="2">مدیر</option>
            <option value="1">مدیر ارشد</option>

        </select>
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

