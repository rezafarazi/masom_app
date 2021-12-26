<section>


    <br>


    <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL">


        <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>


        <?php

        $user_name=$_SESSION['Username'];
        $Permission=$_SESSION['Permission'];

        if($Permission=='1')
        {
            $STRING_GET_MENU_ITEM2 = SELECT_BY_QUARY("SELECT * FROM menu_items2", "id~title~image~cat_id~visible_flag", 1);
        }
        else
        {
            $STRING_GET_MENU_ITEM2 = SELECT_BY_QUARY("SELECT * FROM menu_items2 WHERE creator='$user_name';", "id~title~image~cat_id~visible_flag", 1);
        }

        echo "<script>var sub_items_merged='$STRING_GET_MENU_ITEM2';</script>";
        $ARRAY_LIST_POST=preg_split("/\^/",$STRING_GET_MENU_ITEM2);

        ?>


        <center>

            <form method="post" action="UPDATE_SUB_ITEM_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">

                <h4>ویرایش زیر بخش ها</h4>
                <br>
                <!--Combobox Start-->
                <select class="COMBOBOX" name="COMBO_UPDATE_POST" onchange="Change_Combobox_Update_SUB_ITEM(this)">
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
                <!--Title Start-->
                <input type="text" class="INPUT-TEXT" placeholder="عنوان" name="TITLE_UPDATE_SUB_ITEM" id="UPDATE_SUB_ITEM_TITLE"/>
                <!--Title End-->
                <br>
                <br>
                <label>قابل مشاهده بودن : <input type="checkbox" checked="checked" id="UPDATE_SUB_ITEM_CHECKBOX" name="visible_flag"></label>
                <br>
                <br>
                <!--Combobox Start-->
                <select class="COMBOBOX" name="COMBO_UPDATE_ITEM" id="UPDATE_COMBOBOX_SELECT_ITEM">
                    <?php

                    for($counter=1;$counter<count($ARRAY_LIST_SUB_ITEM);$counter++)
                    {
                        $ARRAY_LIST_SUB_ITEM_INTER=preg_split("/\~/",$ARRAY_LIST_SUB_ITEM[$counter]);
                        echo "<option value='$ARRAY_LIST_SUB_ITEM_INTER[0]'>$ARRAY_LIST_SUB_ITEM_INTER[1]</option>";
                    }

                    ?>
                </select>
                <!--Combobox End-->
                <br>
                <br>
                <!--Chosee File Start-->
                <label class="FILE_LABLE">
                    <center>
                        <p class="FILE_LABLE_TEXT_P">عکس جدید</p>
                    </center>
                    <input type="file" name="IMAGE_FILE_UPDATE" class="CHOSEE_FILE_INPUT_BUTTON">
                </label>
                <!--Chosee File End-->
                <br>
                <!--SUBMIT Button Start-->
                <input type="submit" id="Submit_PANLE" value="انتشار">
                <!--SUBMIT Button End-->
            </form>


            <form method="post" action="DELETE_SUB_ITEM_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">

                <input type="text" id="DELETE-SUB-ITEM-INPUT-TEXT" style="display: none;" placeholder="عنوان" name="DELETE_TITLE_UPDATE_SUB_ITEM"/>

                <!--SUBMIT Button Start-->
                <input type="submit" class="DELETE_BTN" value="حذف">
                <!--SUBMIT Button End-->

            </form>


        </center>




        <script>

            var Menu_SUB_ITEMS;

            window.addEventListener("load",function (e)
            {
                Menu_SUB_ITEMS=sub_items_merged.split("^");
                sub_item_menu_changed_event(1);
            });


            function Change_Combobox_Update_SUB_ITEM(e)
            {
                sub_item_menu_changed_event(e.selectedIndex+1);
            }


            function sub_item_menu_changed_event(index)
            {
                var t_ITEM=Menu_SUB_ITEMS[index].split("~");

                document.getElementById("UPDATE_SUB_ITEM_TITLE").value=t_ITEM[1];
                document.getElementById("UPDATE_COMBOBOX_SELECT_ITEM").value=t_ITEM[3];
                document.getElementById("DELETE-SUB-ITEM-INPUT-TEXT").value=t_ITEM[0];

                if(t_ITEM[4]=="1")
                {
                    document.getElementById("UPDATE_SUB_ITEM_CHECKBOX").checked=true;
                }
                else
                {
                    document.getElementById("UPDATE_SUB_ITEM_CHECKBOX").checked=false;
                }

            }


        </script>



    </div>
</section>