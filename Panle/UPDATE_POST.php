<section>

<br>


    <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>


    <?php

    $user_name=$_SESSION['Username'];
    $Permission=$_SESSION['Permission'];

    if($Permission=='1')
    {
        $STRING_GET_POST = SELECT_BY_QUARY("SELECT * FROM contents", "id~title~image~html_content~cat_id~visible_flag", 1);
    }
    else
    {
        $STRING_GET_POST = SELECT_BY_QUARY("SELECT * FROM contents WHERE creator='$user_name';", "id~title~image~html_content~cat_id~visible_flag", 1);
    }

    echo "<script>var all_posts='$STRING_GET_POST';</script>";
    $ARRAY_LIST_POST=preg_split("/\^/",$STRING_GET_POST);

    ?>



    <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL">



        <center>


            <form method="post" action="UPDATE_POST_EVENT.php" enctype="multipart/form-data">

                <h4>ویرایش مطالب</h4>
                <br>
                <!--Combobox Start-->
                <select class="INPUT-TEXT COMBOBOX" name="COMBO_UPDATE_POST" onchange="Change_Combobox_Update(this)">
                    <?php

                    for($counter=1;$counter<count($ARRAY_LIST_POST);$counter++)
                    {
                        $ARRAY_LIST_POST_INTER=preg_split("/\~/",$ARRAY_LIST_POST[$counter]);
                        echo "<option value='$ARRAY_LIST_POST_INTER[0]'>$ARRAY_LIST_POST_INTER[1]</option>";
                    }

                    ?>
                </select>
                <!--Combobox End-->
                <!--Combobox Start-->
                <select class="INPUT-TEXT COMBOBOX" name="COMBO_UPDATE_POST_SUB_ITEM" id="UPDATE_POST_SUB_ITEM_COMBOBOX">
                    <?php

                    $STRING_GET_MENU_ITEM2=SELECT_BY_QUARY("SELECT * FROM menu_items2","id~title~image~cat_id~visible_flag",1);
                    $ARRAY_LIST_POST=preg_split("/\^/",$STRING_GET_MENU_ITEM2);

                    for($counter=1;$counter<count($ARRAY_LIST_POST);$counter++)
                    {
                        $ARRAY_LIST_POST_INTER=preg_split("/\~/",$ARRAY_LIST_POST[$counter]);
                        echo "<option value='$ARRAY_LIST_POST_INTER[0]'>$ARRAY_LIST_POST_INTER[1]</option>";
                    }

                    ?>
                </select>
                <!--Combobox End-->
                <br>
                <br>
                <!--Title Start-->
                <input type="text" id="UPDATE-POST-INPUT-TEXT" class="INPUT-TEXT"  placeholder="عنوان" name="TITLE_UPDATE_POST"/>
                <!--Title End-->
                <br>
                <br>
                <label>
                    قابل مشاهده بودن : <input type="checkbox" checked="checked" id="UPDATE_POST_CHECKBOX" name="visible_flag">
                </label>
                <!--Chosee File Start-->
                <label class="FILE_LABLE">
                    <center>
                        <p class="FILE_LABLE_TEXT_P">عکس جدید</p>
                    </center>
                    <input type="file" name="IMAGE_FILE_UPDATE_POST" class="CHOSEE_FILE_INPUT_BUTTON" id="UPDATE-POST-CHOSEE-IMAGE">
                </label>
                <!--Chosee File End-->
                <br>
                <!--HTML Editor Start-->
                <div class="HTML_EDITOR_MENU">
                    <a style="cursor: pointer;" onclick="UPDATE_IMAGE_UPDATE_POST(this)">عکس</a>&nbsp;&nbsp;&nbsp;
                    <a style="cursor: pointer;" onclick="UPDATE_FILM_UPDATE_POST(this)">فیلم</a>&nbsp;&nbsp;&nbsp;
                    <a style="cursor: pointer;" onclick="UPDATE_TEXT_UPDATE_POST(this)">متن</a>&nbsp;&nbsp;&nbsp;
                    <a style="cursor: pointer;" onclick="UPDATE_LINK_UPDATE_POST(this)">لینک</a>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="HTML_EDITOR" aria-placeholder="متن یا کد مورد نظر">
                    <textarea class="TEXTAREA" id="TEXT_AREA_UPDATE_POST" name="CONTENT_UPDATE_POST"></textarea>
                </div>
                <!--HTML Editor End-->
                <br>
                <!--SUBMIT Button Start-->
                <input type="submit" id="Submit_PANLE" value="انتشار">
                <!--SUBMIT Button End-->

            </form>

            <form method="post" action="DELETE_POST_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">

                <input type="text" id="DELETE-POST-INPUT-TEXT" style="display: none;" placeholder="عنوان" name="DELETE_TITLE_UPDATE_POST"/>

                <!--SUBMIT Button Start-->
                <input type="submit" class="DELETE_BTN" value="حذف">
                <!--SUBMIT Button End-->

            </form>
        </center>




        <script>


            var all_post_array;

            window.addEventListener("load",function ()
            {
                all_post_array=all_posts.split("^");
                Fill_Feilds(all_post_array[1]);
            });

            function Change_Combobox_Update(e)
            {
                Fill_Feilds(all_post_array[e.selectedIndex+1]);
            }


            function Fill_Feilds(spl_text)
            {

                var spl=spl_text.split('~');


                document.getElementById("DELETE-POST-INPUT-TEXT").value=spl[0];
                document.getElementById("UPDATE-POST-INPUT-TEXT").value=spl[1];
                document.getElementById("UPDATE_POST_SUB_ITEM_COMBOBOX").value=spl[4];


                var content=spl[3];


                for(var a=0;a<content.length;a++)
                {
                    content = content.replace("!@##@!", "<", a);
                    content = content.replace("#@!!@#", ">", a);
                    content = content.replace("$$%%$$", "'", a);
                    content = content.replace("&*&&", "~", a);
                }


                document.getElementById("TEXT_AREA_UPDATE_POST").value=content;



                if(spl[5]==1)
                {
                    document.getElementById("UPDATE_POST_CHECKBOX").checked=true;
                }
                else
                {
                    document.getElementById("UPDATE_POST_CHECKBOX").checked=false;
                }


            }



        </script>


    </div>






    <!--UPDATE Image Dialog Start-->
    <div class="UPDATE_IMAGE_DIALOG" id="UPDATE_IMAGE_UPDATE_POST">

        <div class="UPDATE_IMAGE_DIALOG_INTERNAL">

            <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG">

                <center>

                    <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                        <input type="text" placeholder="لینک" class="Dialog_input_text" id="UPDATE_IMAGE_UPDATE_POST_TEXT_VIEW"/>

                    </div>

                    <br>

                    <div>
                        <a id="DONE_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="ONCLICK_DONE_BUTTON_UPDATE_IMAGE(this)">تایید</a>
                        <a id="CANCEL_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="CLOSE_UPDATE_IMAGE_UPDATE_POST(this)">انصراف</a>
                    </div>

                </center>

            </div>

        </div>


        <script>

            document.getElementById("UPDATE_IMAGE_UPDATE_POST_TEXT_VIEW").addEventListener("keyup",function (e)
            {

                if(e.keyCode === 13)
                {
                    APPEND_UPDATE_IMAGE();
                }

            });


            function APPEND_UPDATE_IMAGE()
            {
                var All_Content=document.getElementById("TEXT_AREA_UPDATE_POST").value;
                var UPDATE_IMAGE=document.getElementById("UPDATE_IMAGE_UPDATE_POST_TEXT_VIEW").value;
                UPDATE_IMAGE="\n<img src='"+UPDATE_IMAGE+"'/>";
                var UPDATE_Content=All_Content+UPDATE_IMAGE;
                document.getElementById("TEXT_AREA_UPDATE_POST").value=UPDATE_Content;
                document.getElementById("UPDATE_IMAGE_UPDATE_POST_TEXT_VIEW").value="";
                $("#UPDATE_IMAGE_UPDATE_POST").css("display","none");
            }


            function ONCLICK_DONE_BUTTON_UPDATE_IMAGE(e)
            {
                APPEND_UPDATE_IMAGE();
            }


            function UPDATE_IMAGE_UPDATE_POST(e)
            {
                $("#UPDATE_IMAGE_UPDATE_POST").css("display","block");
                $(".Dialog_input_text").focus();
            }


            function CLOSE_UPDATE_IMAGE_UPDATE_POST(e)
            {
                document.getElementById("UPDATE_IMAGE_UPDATE_POST_TEXT_VIEW").value="";
                $("#UPDATE_IMAGE_UPDATE_POST").css("display","none");
            }

        </script>

    </div>
    <!--UPDATE Image Dialog End-->






    <!--UPDATE FILM Dialog Start-->
    <div class="UPDATE_IMAGE_DIALOG" id="UPDATE_FILM_UPDATE_POST">

        <div class="UPDATE_IMAGE_DIALOG_INTERNAL">

            <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG">

                <center>

                    <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                        <input type="text" placeholder="لینک" class="Dialog_input_text" id="UPDATE_FILM_UPDATE_POST_TEXT_VIEW"/>

                    </div>

                    <br>

                    <div>
                        <a id="DONE_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="ONCLICK_DONE_BUTTON_UPDATE_FILM_UPDATE_POST(this)">تایید</a>
                        <a id="CANCEL_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="CLOSE_UPDATE_FILM_UPDATE_POST(this)">انصراف</a>
                    </div>

                </center>

            </div>

        </div>


        <script>

            document.getElementById("UPDATE_FILM_UPDATE_POST_TEXT_VIEW").addEventListener("keyup",function (e)
            {

                if(e.keyCode === 13)
                {
                    APPEND_FILM_UPDATE_POST();
                }

            });


            function ONCLICK_DONE_BUTTON_UPDATE_FILM_UPDATE_POST(e)
            {
                APPEND_FILM_UPDATE_POST();
            }


            function APPEND_FILM_UPDATE_POST()
            {
                var All_Content=document.getElementById("TEXT_AREA_UPDATE_POST").value;
                var UPDATE_FILM=document.getElementById("UPDATE_FILM_UPDATE_POST_TEXT_VIEW").value;
                UPDATE_FILM="\n "+ "<video controls><source src='"+UPDATE_FILM+"' type='video/mp4'><source src='"+UPDATE_FILM+"' type='video/ogg'>فیلم مورد نظر شما پشتیبانی نمی شود</video> ";
                var UPDATE_Content=All_Content+UPDATE_FILM;
                document.getElementById("TEXT_AREA_UPDATE_POST").value=UPDATE_Content;
                document.getElementById("UPDATE_FILM_UPDATE_POST_TEXT_VIEW").value="";
                $("#UPDATE_FILM_UPDATE_POST").css("display","none");

            }


            function UPDATE_FILM_UPDATE_POST(e)
            {
                $("#UPDATE_FILM_UPDATE_POST").css("display","block");
                $(".Dialog_input_text").focus();
            }


            function CLOSE_UPDATE_FILM_UPDATE_POST(e)
            {
                $("#UPDATE_FILM_UPDATE_POST").css("display","none");
                document.getElementById("UPDATE_FILM_UPDATE_POST_TEXT_VIEW").value="";
            }


        </script>

    </div>
    <!--UPDATE FILM Dialog End-->






    <!--UPDATE TEXT Dialog Start-->
    <div class="UPDATE_IMAGE_DIALOG" id="UPDATE_TEXT_UPDATE_POST">

        <div class="UPDATE_IMAGE_DIALOG_INTERNAL">

            <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG" style="top: 18%;">

                <center>

                    <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                        <textarea style="height: 300px;" class="Dialog_input_text" id="UPDATE_TEXT_UPDATE_POST_TEXT_VIEW" placeholder="متن"></textarea>

                    </div>

                    <br>

                    <div>
                        <a id="DONE_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="ONCLICK_DONE_BUTTON_UPDATE_TEXT_UPDATE_POST(this)">تایید</a>
                        <a id="CANCEL_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="CLOSE_UPDATE_TEXT_UPDATE_POST(this)">انصراف</a>
                    </div>

                </center>

            </div>

        </div>


        <script>

            document.getElementById("UPDATE_TEXT_UPDATE_POST_TEXT_VIEW").addEventListener("keyup",function (e)
            {

                if(e.keyCode === 0)
                {
                    APPEND_UPDATE_TEXT_UPDATE_POST();
                }

            });


            function APPEND_UPDATE_TEXT_UPDATE_POST()
            {
                var All_Content=document.getElementById("TEXT_AREA_UPDATE_POST").value;
                var UPDATE_TEXT=document.getElementById("UPDATE_TEXT_UPDATE_POST_TEXT_VIEW").value;
                UPDATE_TEXT="\n "+ "<p class='STANDARD_TEXT_STYLE'>"+UPDATE_TEXT+"</p>";
                var UPDATE_Content=All_Content+UPDATE_TEXT;
                document.getElementById("TEXT_AREA_UPDATE_POST").value=UPDATE_Content;
                document.getElementById("UPDATE_TEXT_UPDATE_POST_TEXT_VIEW").value="";
                $("#UPDATE_TEXT_UPDATE_POST").css("display","none");
            }


            function ONCLICK_DONE_BUTTON_UPDATE_TEXT_UPDATE_POST(e)
            {
                APPEND_UPDATE_TEXT_UPDATE_POST();
            }


            function UPDATE_TEXT_UPDATE_POST(e)
            {
                $("#UPDATE_TEXT_UPDATE_POST").css("display","block");
                $(".Dialog_input_text").focus();
            }


            function CLOSE_UPDATE_TEXT_UPDATE_POST(e)
            {
                $("#UPDATE_TEXT_UPDATE_POST").css("display","none");
                document.getElementById("UPDATE_TEXT_UPDATE_POST_TEXT_VIEW").value="";
            }


        </script>

    </div>
    <!--UPDATE TEXT Dialog End-->






    <!--UPDATE FILM Dialog Start-->
    <div class="UPDATE_IMAGE_DIALOG" id="UPDATE_LINK_UPDATE_POST">

        <div class="UPDATE_IMAGE_DIALOG_INTERNAL">

            <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG" style="top: 40%;">

                <center>

                    <div class="UPDATE_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                        <input type="text" placeholder="نوشته" class="Dialog_input_text" id="UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW"/>
                        <br>
                        <input type="text" placeholder="لینک" class="Dialog_input_text" id="UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW"/>

                    </div>

                    <br>

                    <div>
                        <a id="DONE_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="ONCLICK_DONE_BUTTON_UPDATE_LINK_UPDATE_POST(this)">تایید</a>
                        <a id="CANCEL_BUTTON_UPDATE_TEXT_UPDATE_POST" onclick="CLOSE_UPDATE_LINK_UPDATE_POST(this)">انصراف</a>
                    </div>

                </center>

            </div>

        </div>


        <script>

            document.getElementById("UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW").addEventListener("keyup",function (e)
            {

                if(e.keyCode === 13)
                {
                    var input=document.getElementById("UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW");
                    if(input.value!="")
                    {
                        APPEND_LINK_UPDATE_POST();
                    }
                    else
                    {
                        $("#UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW").focus();
                    }
                }

            });


            document.getElementById("UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW").addEventListener("keyup",function (e)
            {

                if(e.keyCode === 13)
                {
                    var input=document.getElementById("UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW");
                    if(input.value!="")
                    {
                        APPEND_LINK_UPDATE_POST();
                    }
                    else
                    {
                        $("#UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW").focus();
                    }
                }

            });


            function ONCLICK_DONE_BUTTON_UPDATE_LINK_UPDATE_POST(e)
            {
                APPEND_LINK_UPDATE_POST();
            }


            function APPEND_LINK_UPDATE_POST()
            {
                var All_Content=document.getElementById("TEXT_AREA_UPDATE_POST").value;
                var UPDATE_TEXT=document.getElementById("UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW").value;
                var UPDATE_LINK=document.getElementById("UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW").value;
                UPDATE_LINK="\n "+ "<a href='"+UPDATE_LINK+"'>"+UPDATE_TEXT+"</a>";
                var UPDATE_Content=All_Content+UPDATE_LINK;
                document.getElementById("TEXT_AREA_UPDATE_POST").value=UPDATE_Content;
                document.getElementById("UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW").value="";
                document.getElementById("UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW").value="";
                $("#UPDATE_LINK_UPDATE_POST").css("display","none");

            }


            function UPDATE_LINK_UPDATE_POST(e)
            {
                $("#UPDATE_LINK_UPDATE_POST").css("display","block");
                $("#UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW").focus();
            }


            function CLOSE_UPDATE_LINK_UPDATE_POST(e)
            {
                $("#UPDATE_LINK_UPDATE_POST").css("display","none");
                document.getElementById("UPDATE_LINK_TEXT_UPDATE_POST_TEXT_VIEW").value="";
                document.getElementById("UPDATE_LINK_LINK_UPDATE_POST_TEXT_VIEW").value="";
            }


        </script>

    </div>
    <!--UPDATE FILM Dialog End-->
    
    



    <br>



</section>