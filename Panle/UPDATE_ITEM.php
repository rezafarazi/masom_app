<section>

    <br>

    <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL">



        <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>


        <?php

        $user_name=$_SESSION['Username'];
        $Permission=$_SESSION['Permission'];

        if($Permission=='1')
        {
            $STRING_GET_MENU_ITEM2=SELECT_BY_QUARY("SELECT * FROM menu_items","id~title~image~visible_flag",1);
        }
        else
        {
            $STRING_GET_MENU_ITEM2=SELECT_BY_QUARY("SELECT * FROM menu_items WHERE creator='$user_name';","id~title~image~visible_flag",1);
        }
        echo "<script>var all_menu_items='$STRING_GET_MENU_ITEM2';</script>";
        $ARRAY_LIST_POST=preg_split("/\^/",$STRING_GET_MENU_ITEM2);

        ?>




        <center>
            <form method="post" action="UPDATE_ITEM_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">

                <h4>ویرایش بخش ها</h4>
                <br>
                <!--Combobox Start-->
                <select class="COMBOBOX" name="COMBO_UPDATE_ITEM" onchange="Change_Combobox_Update_ITEM(this)"">
                <?php

                for($counter=1;$counter<count($ARRAY_LIST_POST);$counter++)
                {
                    $ARRAY_LIST_POST_INTER=preg_split("/\~/",$ARRAY_LIST_POST[$counter]);
                    echo "<option value='$ARRAY_LIST_POST_INTER[0]'>$ARRAY_LIST_POST_INTER[1]</option>";
                }

                ?>
                </select>
                <!--Combobox End-->
                <!--Title Start-->
                <input type="text" id="UPDATE-ITEM-INPUT-TEXT" class="INPUT-TEXT"  placeholder="عنوان" name="TITLE_UPDATE_ITEM"/>
                <!--Title End-->
                <br>
                <br>
                <label>قابل مشاهده بودن : <input type="checkbox" checked="checked" id="UPDATE_ITEM_CHECKBOX" name="visible_flag"></label>
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



            <form method="post" action="DELETE_ITEM_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">

                <input type="text" id="DELETE-ITEM-INPUT-TEXT" style="display: none;" placeholder="عنوان" name="DELETE_TITLE_UPDATE_ITEM"/>

                <!--SUBMIT Button Start-->
                <input type="submit" class="DELETE_BTN" value="حذف">
                <!--SUBMIT Button End-->

            </form>

        </center>




        <script>


            var menu_items;

            window.addEventListener("load",function (e)
            {
               menu_items=all_menu_items.split("^");
               update_item_combo_change_event(1);
            });


            function Change_Combobox_Update_ITEM(e)
            {
                update_item_combo_change_event(e.selectedIndex+1);
            }


            function update_item_combo_change_event(index)
            {
                var all_itemsss=menu_items[index].split("~");


                if(all_itemsss[3]=="1")
                {
                    document.getElementById("UPDATE_ITEM_CHECKBOX").checked=true;
                }
                else
                {
                    document.getElementById("UPDATE_ITEM_CHECKBOX").checked=false;
                }

                document.getElementById("UPDATE-ITEM-INPUT-TEXT").value=all_itemsss[1];
                document.getElementById("DELETE-ITEM-INPUT-TEXT").value=all_itemsss[0];

            }


        </script>






    </div>
</section>