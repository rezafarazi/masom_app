<div>

    <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){echo "<script> window.location='../panle.php#PROFILE'; </script>";} ?>

    <br>
    <h3>همه کاربران</h3>
    <div id="USER_PANLE_TABLE">

        <br>

        <table dir="rtl" style="margin: 0 auto;" class="USER_TABLE">

            <tr style="background: #F4F4F4">
                <th>نام کاربر</th>
                <th>نام کامل</th>
                <th>ایمیل</th>
                <th>موبایل</th>
                <th>جنسیت</th>
                <th>عکس</th>
                <th>وضعیت کاربر</th>
                <th>سمت</th>
                <th>عملیات</th>
            </tr>

            <?php

            $table_color=0;





            $QUARY=SELECT_BY_QUARY("SELECT * FROM users WHERE permission=3","user~Name~Family~email~sex~image~enable_flag~permission~id~phone","1");
            $QUARRY_ARRAY=preg_split("/\^/",$QUARY);




            for ($i=1;$i<count($QUARRY_ARRAY);$i++)
            {

                $ALL_USERs_ARRAY=preg_split("/\~/",$QUARRY_ARRAY[$i]);

                if($ALL_USERs_ARRAY[6]=="1")
                {
                    $ALL_USERs_ARRAY[6]="فعال";
                }
                else
                {
                    $ALL_USERs_ARRAY[6]="غیرفعال";
                }




                if($ALL_USERs_ARRAY[7]=="1")
                {
                    $ALL_USERs_ARRAY[7]="مدیر کل";
                }
                else if($ALL_USERs_ARRAY[7]=="2")
                {
                    $ALL_USERs_ARRAY[7]="مدیر";
                }
                else if($ALL_USERs_ARRAY[7]=="3")
                {
                    $ALL_USERs_ARRAY[7]="نویسنده";
                }
                else
                {
                    $ALL_USERs_ARRAY[7]="کاربر وب سایت";
                }




                if($table_color==0)
                {
                    echo "<tr style='background: #FFF3E0;'><td><p>$ALL_USERs_ARRAY[0]</p></td><td><p>$ALL_USERs_ARRAY[1]</p></td><td><p>$ALL_USERs_ARRAY[2]</p></td><td><p>$ALL_USERs_ARRAY[3]</p></td><td><p>$ALL_USERs_ARRAY[9]</p></td><td><p>$ALL_USERs_ARRAY[4]</p></td><td><a target='_blank' href='../$ALL_USERs_ARRAY[5]'>عکس</a></td><td><p>$ALL_USERs_ARRAY[6]</p></td><td><p>$ALL_USERs_ARRAY[7]</p></td><td><a target='_blank' href='USERS/EDIT_USER/EDIT_USER.php?user_id=$ALL_USERs_ARRAY[8]'>ویرایش</a></td></tr>";
                    $table_color=1;
                }
                else
                {
                    echo "<tr style='background: #FFFDE7;'><td><p>$ALL_USERs_ARRAY[0]</p></td><td><p>$ALL_USERs_ARRAY[1]</p></td><td><p>$ALL_USERs_ARRAY[2]</p></td><td><p>$ALL_USERs_ARRAY[3]</p></td><td><p>$ALL_USERs_ARRAY[9]</p></td><td><p>$ALL_USERs_ARRAY[4]</p></td><td><a target='_blank' href='../$ALL_USERs_ARRAY[5]'>عکس</a></td><td><p>$ALL_USERs_ARRAY[6]</p></td><td><p>$ALL_USERs_ARRAY[7]</p></td><td><a target='_blank' href='USERS/EDIT_USER/EDIT_USER.php?user_id=$ALL_USERs_ARRAY[8]'>ویرایش</a></td></tr>";
                    $table_color=0;
                }

            }

            ?>

        </table>

    </div>

</div>