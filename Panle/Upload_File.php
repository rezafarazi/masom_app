<section>

    <br>



    <style>

        #UPLOAD_FILE_TABLE
        {
            overflow-x: scroll;
        }

        #UPLOAD_FILE_TABLE::-webkit-scrollbar
        {
            background: #CCC;
            height: 3px;
        }

        #UPLOAD_FILE_TABLE::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.2);
            border-radius: 10px;
        }

        #UPLOAD_FILE_TABLE::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }


    </style>


<!--    id="UPLOAD_FILE_PANLE_INTERNAL"-->
    <div class="MY_WEB_MATRIAL_BORDER MY_WEB_MATRIAL_BORDER_INTERNAL" id="UPLOAD_FILE_TABLE">




        <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>


        <?php

        $_SESSION['DELETE_FILE']=1;

        $table_color=0;

        ?>


        <center>

            <h4>آپلود فایل</h4>

            <form method="post" action="Upload_File_EVENT.php" class="is-multiline" enctype="multipart/form-data" id="From_NEW_ITEM">



                <!--Chosee File Start-->
                <label class="FILE_LABLE" style="width: 350px;" id="FILE_LABLE_UPLOAD_FILE_PANLE">
                    <center>
                        <p class="FILE_LABLE_TEXT_P">فایل</p>
                    </center>
                    <input type="file" name="IMAGE_FILE_NEW_ITEM" class="CHOSEE_FILE_INPUT_BUTTON">
                </label>
                <!--Chosee File End-->

                <br>

                <!--SUBMIT Button Start-->
                <input type="submit" id="Submit_PANLE" value="انتشار">
                <!--SUBMIT Button End-->


            </form>


            <br>
            <br>





            <div>

                <h3>همه فایل ها</h3>
                <div id="UPLOAD_FILE_PANLE_TABLE">

                <br>

                <table dir="rtl" class="TABLE">

                    <tr style="background: #F4F4F4">
                        <th>نام فایل</th>
                        <th>آدرس فایل</th>
                        <th>عملیات</th>
                    </tr>

                    <?php

                        $files_names=preg_split("/\~/",Get_All_Upload_Files());

                        for ($i=0;$i<count($files_names)-1;$i++)
                        {
                            if($files_names[$i]!="File_Name.txt")
                            {
                                if($table_color==0)
                                {
                                    echo "<tr style='background: #FFF3E0;'><td class='LINK_UPLOAD_FILES'><a target='_blank' class='LINK_UPLOAD_FILES_A_TAG' href='../uploads/Files/$files_names[$i]'>$files_names[$i]</a></td><td class='LINK_UPLOAD_FILES'><p onclick='onclick_copy_address(this)'>uploads/Files/$files_names[$i]</p></td><td><a href='Delete_File_EVENT.php?file_name=$files_names[$i]'>حذف</a></td></tr>";
                                    $table_color=1;
                                }
                                else
                                {
                                    echo "<tr style='background: #FFFDE7;'><td class='LINK_UPLOAD_FILES'><a target='_blank' class='LINK_UPLOAD_FILES_A_TAG' href='../uploads/Files/$files_names[$i]'>$files_names[$i]</a></td><td class='LINK_UPLOAD_FILES'><p onclick='onclick_copy_address(this)'>uploads/Files/$files_names[$i]</p></td><td><a href='Delete_File_EVENT.php?file_name=$files_names[$i]'>حذف</a></td></tr>";
                                    $table_color=0;
                                }
                            }
                        }

                    ?>

                </table>

            </div>

            </div>






        </center>



    </div>




    <script>

        function onclick_copy_address(e)
        {
            var text=e.textContent;
            navigator.clipboard.writeText(text).then(function() {
                console.log('Async: Copying to clipboard was successful!');
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
            });
            alert("آدرس فایل مورد نظر کپی شد");
        }

    </script>

    <br>
    <br>


</section>