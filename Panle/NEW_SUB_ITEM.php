<section>

    <br>

    <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>

    <?php

    $STRING_GET_MENU_ITEM2=SELECT_BY_QUARY("SELECT * FROM menu_items","id~title~image",1);
    $ARRAY_LIST_SUB_ITEM=preg_split("/\^/",$STRING_GET_MENU_ITEM2);


    ?>





    <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL">


        <center>

            <form method="post" action="NEW_SUB_ITEM_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_SUB_ITEM">

                <h4>زیر بخش جدید</h4>
                <br>
                <!--Title Start-->
                <input type="text" class="INPUT-TEXT" placeholder="عنوان" name="TITLE_NEW_SUB_ITEM"/>
                <!--Title End-->
                <br>
                <br>
                <label>قابل مشاهده بودن : <input type="checkbox" checked="checked" name="visible_flag"></label>
                <br>
                <br>
                <!--Combobox Start-->
                <select class="COMBOBOX" name="COMBO_NEW_SUB_ITEM" style="margin-top: 0px !important;">
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
                    <input type="file" name="IMAGE_FILE_NEW_SUB_ITEM" class="CHOSEE_FILE_INPUT_BUTTON">
                </label>
                <!--Chosee File End-->
                <br>
                <!--SUBMIT Button Start-->
                <input type="submit" id="Submit_PANLE" value="انتشار">
                <!--SUBMIT Button End-->
            </form>

        </center>


    </div>


</section>