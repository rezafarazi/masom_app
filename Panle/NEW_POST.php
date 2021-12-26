<section>


        <br>

        <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>

        <?php

        $STRING_GET_MENU_ITEM2=SELECT_BY_QUARY("SELECT * FROM menu_items2","id~title~image~cat_id",1);
        $ARRAY_LIST_POST=preg_split("/\^/",$STRING_GET_MENU_ITEM2);

        ?>






        <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL">

            <center>


                <form method="post" action="NEW_POST_EVENT.php" enctype="multipart/form-data">

                    <h4>مطلب جدید</h4>
                    <br>
                    <!--Title Start-->
                    <input class="INPUT-TEXT" name="TITLE_NEW_POST" type="text" placeholder="عنوان" />
                    <!--Title End-->
                    <!--Combobox Start-->
                    <select class="INPUT-TEXT COMBOBOX" name="COMBO_NEW_POST">
                        <?php

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
                    <label>
                        قابل مشاهده بودن : <input type="checkbox" checked="checked" name="visible_flag">
                    </label>
                    <!--Chosee File Start-->
                    <label class="FILE_LABLE">
                        <center>
                            <p class="FILE_LABLE_TEXT_P">عکس جدید</p>
                        </center>
                        <input type="file" name="IMAGE_FILE_NEW_POST" class="CHOSEE_FILE_INPUT_BUTTON">
                    </label>
                    <!--Chosee File End-->
                    <br>
                    <!--HTML Editor Start-->
                    <div class="HTML_EDITOR_MENU">
                        <a style="cursor: pointer;" onclick="NEW_IMAGE_NEW_POST(this)">عکس</a>&nbsp;&nbsp;&nbsp;
                        <a style="cursor: pointer;" onclick="NEW_FILM_NEW_POST(this)">فیلم</a>&nbsp;&nbsp;&nbsp;
                        <a style="cursor: pointer;" onclick="NEW_TEXT_NEW_POST(this)">متن</a>&nbsp;&nbsp;&nbsp;
                        <a style="cursor: pointer;" onclick="NEW_LINK_NEW_POST(this)">لینک</a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="HTML_EDITOR" aria-placeholder="متن یا کد مورد نظر">
                        <textarea class="TEXTAREA" name="CONTENT_NEW_POST" id="NEW_POST_TEXT_CONTENT"></textarea>
                    </div>
                    <!--HTML Editor End-->
                    <br>
                    <!--SUBMIT Button Start-->
                    <input type="submit" id="Submit_PANLE" value="انتشار">
                    <!--SUBMIT Button End-->


                </form>

            </center>

            <br>

        </div>






        <!--NEW Image Dialog Start-->
        <div class="NEW_IMAGE_DIALOG" id="NEW_IMAGE_NEW_POST">

            <div class="NEW_IMAGE_DIALOG_INTERNAL">

                <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG">

                    <center>

                        <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                            <input type="text" placeholder="لینک" class="Dialog_input_text" id="NEW_IMAGE_NEW_POST_TEXT_VIEW"/>

                        </div>

                        <br>

                        <div>
                            <a id="DONE_BUTTON_NEW_TEXT_NEW_POST" onclick="ONCLICK_DONE_BUTTON_NEW_IMAGE(this)">تایید</a>
                            <a id="CANCEL_BUTTON_NEW_TEXT_NEW_POST" onclick="CLOSE_NEW_IMAGE_NEW_POST(this)">انصراف</a>
                        </div>

                    </center>

                </div>

            </div>


            <script>

                document.getElementById("NEW_IMAGE_NEW_POST_TEXT_VIEW").addEventListener("keyup",function (e)
                {

                    if(e.keyCode === 13)
                    {
                        APPEND_NEW_IMAGE();
                    }

                });


                function APPEND_NEW_IMAGE()
                {
                    var All_Content=document.getElementById("NEW_POST_TEXT_CONTENT").value;
                    var NEW_IMAGE=document.getElementById("NEW_IMAGE_NEW_POST_TEXT_VIEW").value;
                    NEW_IMAGE="\n<img src='"+NEW_IMAGE+"'/>";
                    var NEW_Content=All_Content+NEW_IMAGE;
                    document.getElementById("NEW_POST_TEXT_CONTENT").value=NEW_Content;
                    document.getElementById("NEW_IMAGE_NEW_POST_TEXT_VIEW").value="";
                    $("#NEW_IMAGE_NEW_POST").css("display","none");
                }


                function ONCLICK_DONE_BUTTON_NEW_IMAGE(e)
                {
                    APPEND_NEW_IMAGE();
                }


                function NEW_IMAGE_NEW_POST(e)
                {
                    $("#NEW_IMAGE_NEW_POST").css("display","block");
                    $(".Dialog_input_text").focus();
                }


                function CLOSE_NEW_IMAGE_NEW_POST(e)
                {
                    document.getElementById("NEW_IMAGE_NEW_POST_TEXT_VIEW").value="";
                    $("#NEW_IMAGE_NEW_POST").css("display","none");
                }

            </script>

        </div>
        <!--NEW Image Dialog End-->






        <!--NEW FILM Dialog Start-->
        <div class="NEW_IMAGE_DIALOG" id="NEW_FILM_NEW_POST">

            <div class="NEW_IMAGE_DIALOG_INTERNAL">

                <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG">

                    <center>

                        <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                            <input type="text" placeholder="لینک" class="Dialog_input_text" id="NEW_FILM_NEW_POST_TEXT_VIEW"/>

                        </div>

                        <br>

                        <div>
                            <a id="DONE_BUTTON_NEW_TEXT_NEW_POST" onclick="ONCLICK_DONE_BUTTON_NEW_FILM_NEW_POST(this)">تایید</a>
                            <a id="CANCEL_BUTTON_NEW_TEXT_NEW_POST" onclick="CLOSE_NEW_FILM_NEW_POST(this)">انصراف</a>
                        </div>

                    </center>

                </div>

            </div>


            <script>

                document.getElementById("NEW_FILM_NEW_POST_TEXT_VIEW").addEventListener("keyup",function (e)
                {

                    if(e.keyCode === 13)
                    {
                        APPEND_FILM_NEW_POST();
                    }

                });


                function ONCLICK_DONE_BUTTON_NEW_FILM_NEW_POST(e)
                {
                    APPEND_FILM_NEW_POST();
                }


                function APPEND_FILM_NEW_POST()
                {
                    var All_Content=document.getElementById("NEW_POST_TEXT_CONTENT").value;
                    var NEW_FILM=document.getElementById("NEW_FILM_NEW_POST_TEXT_VIEW").value;
                    NEW_FILM="\n "+ "<video controls><source src='"+NEW_FILM+"' type='video/mp4'><source src='"+NEW_FILM+"' type='video/ogg'>فیلم مورد نظر شما پشتیبانی نمی شود</video> ";
                    var NEW_Content=All_Content+NEW_FILM;
                    document.getElementById("NEW_POST_TEXT_CONTENT").value=NEW_Content;
                    document.getElementById("NEW_FILM_NEW_POST_TEXT_VIEW").value="";
                    $("#NEW_FILM_NEW_POST").css("display","none");

                }


                function NEW_FILM_NEW_POST(e)
                {
                    $("#NEW_FILM_NEW_POST").css("display","block");
                    $(".Dialog_input_text").focus();
                }


                function CLOSE_NEW_FILM_NEW_POST(e)
                {
                    $("#NEW_FILM_NEW_POST").css("display","none");
                    document.getElementById("NEW_FILM_NEW_POST_TEXT_VIEW").value="";
                }


            </script>

        </div>
        <!--NEW FILM Dialog End-->






        <!--NEW TEXT Dialog Start-->
        <div class="NEW_IMAGE_DIALOG" id="NEW_TEXT_NEW_POST">

            <div class="NEW_IMAGE_DIALOG_INTERNAL">

                <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG" style="top: 18%;">

                    <center>

                        <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                            <textarea style="height: 300px;" class="Dialog_input_text" id="NEW_TEXT_NEW_POST_TEXT_VIEW" placeholder="متن"></textarea>

                        </div>

                        <br>

                        <div>
                            <a id="DONE_BUTTON_NEW_TEXT_NEW_POST" onclick="ONCLICK_DONE_BUTTON_NEW_TEXT_NEW_POST(this)">تایید</a>
                            <a id="CANCEL_BUTTON_NEW_TEXT_NEW_POST" onclick="CLOSE_NEW_TEXT_NEW_POST(this)">انصراف</a>
                        </div>

                    </center>

                </div>

            </div>


            <script>

                document.getElementById("NEW_TEXT_NEW_POST_TEXT_VIEW").addEventListener("keyup",function (e)
                {

                    if(e.keyCode === 0)
                    {
                        APPEND_NEW_TEXT_NEW_POST();
                    }

                });


                function APPEND_NEW_TEXT_NEW_POST()
                {
                    var All_Content=document.getElementById("NEW_POST_TEXT_CONTENT").value;
                    var NEW_TEXT=document.getElementById("NEW_TEXT_NEW_POST_TEXT_VIEW").value;
                    NEW_TEXT="\n "+ "<p class='STANDARD_TEXT_STYLE'>"+NEW_TEXT+"</p>";
                    var NEW_Content=All_Content+NEW_TEXT;
                    document.getElementById("NEW_POST_TEXT_CONTENT").value=NEW_Content;
                    document.getElementById("NEW_TEXT_NEW_POST_TEXT_VIEW").value="";
                    $("#NEW_TEXT_NEW_POST").css("display","none");
                }


                function ONCLICK_DONE_BUTTON_NEW_TEXT_NEW_POST(e)
                {
                    APPEND_NEW_TEXT_NEW_POST();
                }


                function NEW_TEXT_NEW_POST(e)
                {
                    $("#NEW_TEXT_NEW_POST").css("display","block");
                    $(".Dialog_input_text").focus();
                }


                function CLOSE_NEW_TEXT_NEW_POST(e)
                {
                    $("#NEW_TEXT_NEW_POST").css("display","none");
                    document.getElementById("NEW_TEXT_NEW_POST_TEXT_VIEW").value="";
                }


            </script>

        </div>
        <!--NEW TEXT Dialog End-->






        <!--NEW FILM Dialog Start-->
        <div class="NEW_IMAGE_DIALOG" id="NEW_LINK_NEW_POST">

            <div class="NEW_IMAGE_DIALOG_INTERNAL">

                <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG" style="top: 40%;">

                    <center>

                        <div class="NEW_IMAGE_DIALOG_INTERNAL_DIALOG_CONTENT">

                            <input type="text" placeholder="نوشته" class="Dialog_input_text" id="NEW_LINK_TEXT_NEW_POST_TEXT_VIEW"/>
                            <br>
                            <input type="text" placeholder="لینک" class="Dialog_input_text" id="NEW_LINK_LINK_NEW_POST_TEXT_VIEW"/>

                        </div>

                        <br>

                        <div>
                            <a id="DONE_BUTTON_NEW_TEXT_NEW_POST" onclick="ONCLICK_DONE_BUTTON_NEW_LINK_NEW_POST(this)">تایید</a>
                            <a id="CANCEL_BUTTON_NEW_TEXT_NEW_POST" onclick="CLOSE_NEW_LINK_NEW_POST(this)">انصراف</a>
                        </div>

                    </center>

                </div>

            </div>


            <script>

                document.getElementById("NEW_LINK_TEXT_NEW_POST_TEXT_VIEW").addEventListener("keyup",function (e)
                {

                    if(e.keyCode === 13)
                    {
                        var input=document.getElementById("NEW_LINK_LINK_NEW_POST_TEXT_VIEW");
                        if(input.value!="")
                        {
                            APPEND_LINK_NEW_POST();
                        }
                        else
                        {
                            $("#NEW_LINK_LINK_NEW_POST_TEXT_VIEW").focus();
                        }
                    }

                });


                document.getElementById("NEW_LINK_LINK_NEW_POST_TEXT_VIEW").addEventListener("keyup",function (e)
                {

                    if(e.keyCode === 13)
                    {
                        var input=document.getElementById("NEW_LINK_TEXT_NEW_POST_TEXT_VIEW");
                        if(input.value!="")
                        {
                            APPEND_LINK_NEW_POST();
                        }
                        else
                        {
                            $("#NEW_LINK_TEXT_NEW_POST_TEXT_VIEW").focus();
                        }
                    }

                });


                function ONCLICK_DONE_BUTTON_NEW_LINK_NEW_POST(e)
                {
                    APPEND_LINK_NEW_POST();
                }


                function APPEND_LINK_NEW_POST()
                {
                    var All_Content=document.getElementById("NEW_POST_TEXT_CONTENT").value;
                    var NEW_TEXT=document.getElementById("NEW_LINK_TEXT_NEW_POST_TEXT_VIEW").value;
                    var NEW_LINK=document.getElementById("NEW_LINK_LINK_NEW_POST_TEXT_VIEW").value;
                    NEW_LINK="\n "+ "<a href='"+NEW_LINK+"'>"+NEW_TEXT+"</a>";
                    var NEW_Content=All_Content+NEW_LINK;
                    document.getElementById("NEW_POST_TEXT_CONTENT").value=NEW_Content;
                    document.getElementById("NEW_LINK_TEXT_NEW_POST_TEXT_VIEW").value="";
                    document.getElementById("NEW_LINK_LINK_NEW_POST_TEXT_VIEW").value="";
                    $("#NEW_LINK_NEW_POST").css("display","none");

                }


                function NEW_LINK_NEW_POST(e)
                {
                    $("#NEW_LINK_NEW_POST").css("display","block");
                    $("#NEW_LINK_TEXT_NEW_POST_TEXT_VIEW").focus();
                }


                function CLOSE_NEW_LINK_NEW_POST(e)
                {
                    $("#NEW_LINK_NEW_POST").css("display","none");
                    document.getElementById("NEW_LINK_TEXT_NEW_POST_TEXT_VIEW").value="";
                    document.getElementById("NEW_LINK_LINK_NEW_POST_TEXT_VIEW").value="";
                }


            </script>

        </div>
        <!--NEW FILM Dialog End-->








</section>