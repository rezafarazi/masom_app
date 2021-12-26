<center>

    <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){echo "<script> window.location='../panle.php#PROFILE'; </script>";} ?>

    <form method="post" action="USERS/SEARCH_USER_BY_USERNAME.php" style="margin: 25px;" target="_blank">



    <input type="search" placeholder="اینتر + یکی از اطاعات" dir="rtl" class="INPUT-TEXT" name="SEARCH_USER" title="می توانید برای اطلاعات از نام نام خانوادگی نام کاربری شماره ایمیل را وارد کنید"/>

</form>

</center>