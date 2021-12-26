<div class="PROFILE_BORDER">



    <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>


    <br>


    <!--Profile Image Border Start-->
    <div class="PROFILE_IMAGE_BORDER">

        <center>

            <form method="post" action="Change_Profile_Web_Image.php" enctype="multipart/form-data">


                <!-- Title Start-->
                <p>تغییر آیکون وب سایت</p>
                <!-- Title End-->


                <!--Chosee File Start-->
                <input type="file" name="IMAGE_FILE_UPDATE" class="CHOSEE_FILE_INPUT_BUTTON_PROFILE" title="تغییر عکس پروفایل وب سایت">
                <!--Chosee File End-->


                <!--SUBMIT Button Start-->
                <input type="submit" id="Submit_PANLE_PROFILE" value="تغییر">
                <!--SUBMIT Button End-->



            </form>

        </center>

    </div>
    <!--Profile Image Border End-->


    <br>


    <!--Profile Users Start-->
    <div class="PROFILE_USERS_BORDER" dir="rtl">

        <label>همه کاربران <input checked="checked" onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="1" dir="rtl" class="PROFILE_USERS_RADIO"/></label>
        <label>کاربران وب سایت <input onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="2" dir="rtl" class="PROFILE_USERS_RADIO"/></label>
        <label>نویسندگان وب سایت <input onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="3" dir="rtl" class="PROFILE_USERS_RADIO"/></label>
        <label>مدیران وب سایت <input onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="4" dir="rtl" class="PROFILE_USERS_RADIO"/></label>
        <label>مدیران ارشد وب سایت <input onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="5" dir="rtl" class="PROFILE_USERS_RADIO"/></label>
        <label>کاربر جدید <input onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="6" dir="rtl" class="PROFILE_USERS_RADIO"/></label>
        <label>جست و جو <input onchange="ONCHANGE_RADIO_PROFILE_USER_EVENT(this)" name="PROFILE_USER_TYPE" type="radio" value="7" dir="rtl" class="PROFILE_USERS_RADIO"/></label>



        <br>


        <!--USER PANLE START-->
        <section style="margin-top: 10px;">


            <!--All Users Profile Start-->
            <div id="ALL_USERS_PROFILE_PANLE">
                <?php include "USERS/ALL_USERS.php"; ?>
            </div>
            <!--All Users Profile End-->



            <!--WEBSITE Users Profile Start-->
            <div id="WEBSITE_USERS_PROFILE_PANLE">
                <?php include "USERS/WEBSITE_USERS.php"; ?>
            </div>
            <!--WEBSITE Users Profile End-->



            <!--WEB WRITER Users Profile Start-->
            <div id="WEBWRITERS_USERS_PROFILE_PANLE">
                <?php include "USERS/WRITER_USERS.php"; ?>
            </div>
            <!--WEB WRITER Users Profile End-->



            <!--WEB SITE Managers Users Profile Start-->
            <div id="WEB_MANAGERS_USERS_PROFILE_PANLE">
                <?php include "USERS/WEB_MANAGERS_USERS.php"; ?>
            </div>
            <!--WEB SITE Managers Users Profile End-->



            <!--MAIN SITE MANAGERS Users Profile Start-->
            <div id="MAIN_SITE_MANAGERS_USERS_PROFILE_PANLE">
                <?php include "USERS/MAIN_SITE_MANAGER_USERS.php"; ?>
            </div>
            <!--MAIN SITE MANAGERS Users Profile End-->



            <!--SEARCH Users Profile Start-->
            <div id="NEW_USER_PROFILE_PANLE">
                <?php include "USERS/NEW_USER.php"; ?>
            </div>
            <!--SEARCH Users Profile End-->



            <!--SEARCH Users Profile Start-->
            <div id="SEARCH_USERS_PROFILE_PANLE">
                <?php include "USERS/SEARCH_USERS.php"; ?>
            </div>
            <!--SEARCH Users Profile End-->


        </section>
        <!--USER PANLE END-->




        <script>


            window.addEventListener("load",function (e)
            {
                hide_all_PROFILE_USER_PANLES();
                $("#ALL_USERS_PROFILE_PANLE").css("display","block");
            });


            function ONCHANGE_RADIO_PROFILE_USER_EVENT(e)
            {
                hide_all_PROFILE_USER_PANLES();

                switch (e.value)
                {
                    case "1":
                        $("#ALL_USERS_PROFILE_PANLE").css("display","block");
                    break;
                    case "2":
                        $("#WEBSITE_USERS_PROFILE_PANLE").css("display","block");
                    break;
                    case "3":
                        $("#WEBWRITERS_USERS_PROFILE_PANLE").css("display","block");
                    break;
                    case "4":
                        $("#WEB_MANAGERS_USERS_PROFILE_PANLE").css("display","block");
                    break;
                    case "5":
                        $("#MAIN_SITE_MANAGERS_USERS_PROFILE_PANLE").css("display","block");
                    break;
                    case "6":
                        $("#NEW_USER_PROFILE_PANLE").css("display","block");
                    break;
                    case "7":
                        $("#SEARCH_USERS_PROFILE_PANLE").css("display","block");
                    break;
                }

            }


            function hide_all_PROFILE_USER_PANLES()
            {
                $("#ALL_USERS_PROFILE_PANLE").css("display","none");
                $("#WEBSITE_USERS_PROFILE_PANLE").css("display","none");
                $("#WEBWRITERS_USERS_PROFILE_PANLE").css("display","none");
                $("#WEB_MANAGERS_USERS_PROFILE_PANLE").css("display","none");
                $("#MAIN_SITE_MANAGERS_USERS_PROFILE_PANLE").css("display","none");
                $("#NEW_USER_PROFILE_PANLE").css("display","none");
                $("#SEARCH_USERS_PROFILE_PANLE").css("display","none");
            }


        </script>


    </div>
    <!--Profile Users End-->




</div>