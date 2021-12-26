<section>


    <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>


    <br>

    <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL">


        <center>
            <form method="post" action="NEW_ITEM_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">

                <h4>بخش جدید</h4>
                <br>
                <!--Title Start-->
                <input type="text" class="INPUT-TEXT" placeholder="عنوان" name="TITLE_NEW_ITEM"/>
                <!--Title End-->
                <br>
                <br>
                <label>قابل مشاهده بودن : <input type="checkbox" checked="checked" name="visible_flag"></label>
                <br>
                <br>
                <!--Chosee File Start-->
                <label class="FILE_LABLE">
                    <center>
                        <p class="FILE_LABLE_TEXT_P">عکس جدید</p>
                    </center>
                    <input type="file" name="IMAGE_FILE_NEW_ITEM" class="CHOSEE_FILE_INPUT_BUTTON">
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