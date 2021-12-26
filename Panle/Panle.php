<?php include "Check.php"?>
<meta charset="UTF-8">
<html>
<head>

    <title>به نرم افزار مدیریت وب سایت خوش آمدید</title>
    <link rel="icon" href="../GUI/img/ic.png">
    <link href="GUI/css/style.css" type="text/css" rel="stylesheet">

</head>
<body>



    <section>



        <!--LOADING Section Start-->
        <section id="LOADING_PANLES_LAYOUT" style="height: 100%;width: 100%;background: #FFF;">

            <center>

                <img src="Image/loading.gif" width="200px" style="margin-top: 20%;">
                <p style="color:#ff7120;">کمی صبر کنید</p>

            </center>

        </section>
        <!--LOADING Section End-->





        <!--Main Section Start-->
        <section style="display: none;" id="ALL_PANLES_LAYOUT">




                <section>

                    <div id="PANLE_HEADER_MOBILE">
                        <center>
                            <div id="HEADER_MOBILE_PANLE">
                                <img src="../GUI/img/ic.png">
                            </div>
                        </center>
                    </div>


                    <div id="MENU_PANLE">

                        <ul>


                            <li id="PANLE_HEADER_IMAGE"><center><img src="../GUI/img/ic.png"/></center></li>


                            <?php

                            if((int)$_SESSION['Permission']>1)
                            {
                                echo "<li><a target='_blank' href='USERS/EDIT_USER/EDIT_PROFILE.php?user_id=3'>ویرایش پروفایل</a></li>";
                            }

                            ?>


                            <li><a id="NEW_POST_ID">مطلب جدید</a></li>
                            <li><a id="UPDATE_POST_ID">ویرایش مطلالب</a></li>

                            <?php

                            if((int)$_SESSION['Permission']<3)
                            {
                                echo "<li><a id='NEW_ITEM_ID'>بخش جدید</a></li>";
                                echo "<li><a id='UPDATE_ITEM_ID'>ویرایش بخش ها</a></li>";
                                echo "<li><a id='NEW_SUB_ITEM_ID'>زیر بخش جدید</a></li>";
                                echo "<li><a id='UPDATE_SUB_ITEM_ID'>ویرایش زیر بخش ها</a></li>";
                            }

                            if((int)$_SESSION['Permission']<2)
                            {
                                echo "<li><a id='PROFILE_ID'>پروفایل</a></li>";
                                echo "<li><a id='SEEIN_ID'>آمار</a></li>";
                            }

                            ?>

                            <li><a id="UPLOAD_FILE_ID">آپلود فایل</a></li>
                            <li><a href="index.php">خروج</a></li>


                        </ul>

                    </div>

                </section>





                <!--All Panles Start-->
                <section>




                    <!--NEW POST Panle Start-->
                    <div id="NEW_POST_PANLE">
                        <?php include "NEW_POST.php";?>
                    </div>
                    <!--NEW POST Panle End-->





                    <!--NEW ITEM Panle Start-->
                    <div id="NEW_ITEM_PANLE">
                        <?php

                        if((int)$_SESSION['Permission']<3)
                            include "NEW_ITEM.php";

                        ?>
                    </div>
                    <!--NEW ITEM Panle End-->




                    <!--NEW SUB ITEM Panle Start-->
                    <div id="NEW_SUB_ITEM_PANLE">
                        <?php

                        if((int)$_SESSION['Permission']<3)
                            include "NEW_SUB_ITEM.php";

                        ?>
                    </div>
                    <!--NEW SUB ITEM Panle End-->





                    <!--NEW POST Panle Start-->
                    <div id="UPDATE_POST_PANLE">
                        <?php include "UPDATE_POST.php";?>
                    </div>
                    <!--NEW POST Panle End-->




                    <!--NEW ITEM Panle Start-->
                    <div id="UPDATE_ITEM_PANLE">
                        <?php

                        if((int)$_SESSION['Permission']<3)
                        include "UPDATE_ITEM.php";

                        ?>
                    </div>
                    <!--NEW ITEM Panle End-->




                    <!--NEW SUB ITEM Panle Start-->
                    <div id="UPDATE_SUB_ITEM_PANLE">
                        <?php

                        if((int)$_SESSION['Permission']<3)
                            include "UPDATE_SUB_ITEM.php";

                        ?>
                    </div>
                    <!--NEW SUB ITEM Panle End-->




                    <!--UPLOAD File Panle Start-->
                    <div id="PROFILE_PANLE">
                        <?php

                        if((int)$_SESSION['Permission']<2)
                            include "PROFILE.php";

                        ?>
                    </div>
                    <!--UPLOAD File Panle End-->




                    <!--UPLOAD File Panle Start-->
                    <div id="SEEIN_PANLE">
                        <?php

                        if((int)$_SESSION['Permission']<2)
                            include "SEEIN.php";

                        ?>
                    </div>
                    <!--UPLOAD File Panle End-->




                    <!--UPLOAD File Panle Start-->
                    <div id="UPLOAD_FILE_PANLE">
                        <?php include "Upload_File.php";?>
                    </div>
                    <!--UPLOAD File Panle End-->




                </section>
                <!--All Panles End-->







                <style>

                    *
                    {
                        margin: 0;
                        padding: 0;
                    }

                    *::selection
                    {
                        background: #ECD08F !important;
                    }

                    #NEW_ITEM_PANLE,#NEW_SUB_ITEM_PANLE,#UPDATE_ITEM_PANLE,#UPDATE_SUB_ITEM_PANLE,#UPDATE_POST_PANLE,#UPLOAD_FILE_PANLE,#PROFILE_PANLE,#SEEIN_PANLE
                    {
                        display: none;
                    }

                </style>





                <script src="../GUI/js/jquery-3.2.1.min.js"></script>
                <script>


                    $("#NEW_POST_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#NEW_POST_PANLE").css("display","block");
                    });

                    $("#NEW_ITEM_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#NEW_ITEM_PANLE").css("display","block");
                    });

                    $("#NEW_SUB_ITEM_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#NEW_SUB_ITEM_PANLE").css("display","block");
                    });

                    $("#UPDATE_POST_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#UPDATE_POST_PANLE").css("display","block");
                    });

                    $("#UPDATE_ITEM_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#UPDATE_ITEM_PANLE").css("display","block");
                    });

                    $("#UPDATE_SUB_ITEM_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#UPDATE_SUB_ITEM_PANLE").css("display","block");
                    });

                    $("#UPLOAD_FILE_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#UPLOAD_FILE_PANLE").css("display","block");
                    });

                    $("#PROFILE_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#PROFILE_PANLE").css("display","block");
                    });

                    $("#SEEIN_ID").click(function ()
                    {
                        hide_all_panle();
                        $("#SEEIN_PANLE").css("display","block");
                    });



                    function hide_all_panle()
                    {
                        $("#NEW_POST_PANLE").css("display","none");
                        $("#NEW_ITEM_PANLE").css("display","none");
                        $("#NEW_SUB_ITEM_PANLE").css("display","none");
                        $("#UPDATE_POST_PANLE").css("display","none");
                        $("#UPDATE_ITEM_PANLE").css("display","none");
                        $("#UPDATE_SUB_ITEM_PANLE").css("display","none");
                        $("#UPLOAD_FILE_PANLE").css("display","none");
                        $("#PROFILE_PANLE").css("display","none");
                        $("#SEEIN_PANLE").css("display","none");
                    }


                </script>






                <!--MOBILE Menu SCRIPT Start-->
                <script>

                    var Menu_Click=0;

                    $("#HEADER_MOBILE_PANLE").click(function()
                    {
                        if(Menu_Click===0)
                        {
                            $("#PANLE_HEADER_MOBILE").css("background","#ECD08F");
                            $("#MENU_PANLE").css("display","block");
                            Menu_Click=1;
                        }
                        else
                        {
                            $("#PANLE_HEADER_MOBILE").css("background","#FFF");
                            $("#MENU_PANLE").css("display","none");
                            Menu_Click=0;
                        }
                    });
                </script>
                <!--MOBILE Menu SCRIPT End-->





                <!--Page Sharp Start-->
                <script>

                    window.addEventListener("load",function (e)
                    {

                        var url=window.location.href+"#";
                        var page=url.split('#');

                        if(page[1]!="")
                        {
                            hide_all_panle();

                            if(page[1].toUpperCase()=="NEW_POST")
                            {
                                $("#NEW_POST_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="UPDATE_POST")
                            {
                                $("#UPDATE_POST_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="NEW_ITEM")
                            {
                                $("#NEW_ITEM_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="UPDATE_ITEM")
                            {
                                $("#UPDATE_ITEM_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="NEW_SUB_ITEM")
                            {
                                $("#NEW_SUB_ITEM_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="UPDATE_SUB_ITEM")
                            {
                                $("#UPDATE_SUB_ITEM_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="PROFILE")
                            {
                                $("#PROFILE_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="SEEIN")
                            {
                                $("#SEEIN_PANLE").css("display","block");
                            }
                            else if(page[1].toUpperCase()=="UPLOAD")
                            {
                                $("#UPLOAD_FILE_PANLE").css("display","block");
                            }
                        }

                    });

                </script>
                <!--Page Sharp End-->




        </section>
        <!--Main Section End-->




        <!--Loading Script Start-->
        <script>

            window.addEventListener("load",function (e)
            {
                $("#LOADING_PANLES_LAYOUT").css("display","none");
               $("#ALL_PANLES_LAYOUT").css("display","block");
            });

        </script>
        <!--Loading Script End-->


    </section>



</body>
</html>
