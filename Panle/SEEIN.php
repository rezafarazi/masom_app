<section>

    <div class="PROFILE_BORDER">

        <br>

        <div>


            <!--To ALL SEEIN BORDER Start-->
            <div class="SHOWDOW_BORDER TODAY_SEEIN">

                <?php if(strtolower(basename($_SERVER['PHP_SELF']))!="panle.php"){header("location:index.php");} ?>

                <?php

                $QUARY_BY_ALL=SELECT_BY_QUARY("SELECT DISTINCT COUNT(IP) AS count,ip,page_name,date FROM logs;","count~ip~page_name~date","2");

                $QUARY_BY_ALL_ARRAY=preg_split("/\~/",$QUARY_BY_ALL);

                ?>

                <div style="width: 100%;height: 100%;padding: 24px;">
                    <center>
                        <p style="font-size: 24px;"><?php echo $QUARY_BY_ALL_ARRAY[0]; ?></p>
                        <p>تعداد کل بازدید ها</p>
                    </center>
                </div>
            </div>
            <!--To All SEEIN BORDER End-->


            <!--To MONTH SEEIN BORDER Start-->
            <div class="SHOWDOW_BORDER TODAY_SEEIN">

                <?php

                $MONTH = date('m', time());

                $QUARY_BY_MONTH=SELECT_BY_QUARY("SELECT DISTINCT COUNT(IP) AS count,ip,page_name,date FROM logs WHERE date LIKE '$MONTH/%';","count~ip~page_name~date","2");

                $QUARY_BY_MONTH_ARRAY=preg_split("/\~/",$QUARY_BY_MONTH);

                ?>

                <div style="width: 100%;height: 100%;padding: 24px;">
                    <center>
                        <p style="font-size: 24px;"><?php echo $QUARY_BY_MONTH_ARRAY[0]; ?></p>
                        <p>تعداد کل بازدید های ماه</p>
                    </center>
                </div>
            </div>
            <!--To MONTH SEEIN BORDER End-->


            <!--To Day SEEIN BORDER Start-->
            <div class="SHOWDOW_BORDER TODAY_SEEIN">

                <?php

                $TO_DAY = date('d', time());

                $QUARY_BY_TO_DAY=SELECT_BY_QUARY("SELECT DISTINCT COUNT(IP) AS count,ip,page_name,date FROM logs WHERE date LIKE '%/$TO_DAY/%';","count~ip~page_name~date","2");

                $QUARY_BY_TO_DAY_ARRAY=preg_split("/\~/",$QUARY_BY_TO_DAY);

                ?>

                <div style="width: 100%;height: 100%;padding: 24px;">
                    <center>
                        <p style="font-size: 24px;"><?php echo $QUARY_BY_TO_DAY_ARRAY[0]; ?></p>
                        <p>تعداد کل بازدید های امروز</p>
                    </center>
                </div>
            </div>
            <!--To Day SEEIN BORDER End-->


            <!--ALL POSTS SEEIN BORDER Start-->
            <div class="SHOWDOW_BORDER TODAY_SEEIN">

                <?php


                $QUARY_BY_POSTS=SELECT_BY_QUARY("SELECT COUNT(id) AS count FROM contents;","count","2");

                $QUARY_BY_POSTS_ARRAY=preg_split("/\~/",$QUARY_BY_POSTS);

                ?>

                <div style="width: 100%;height: 100%;padding: 24px;">
                    <center>
                        <p style="font-size: 24px;"><?php echo $QUARY_BY_POSTS_ARRAY[0]; ?></p>
                        <p>تعداد همه پست ها</p>
                    </center>
                </div>
            </div>
            <!--ALL POSTS SEEIN BORDER End-->


            <!--ALL SEE POSTS SEEIN BORDER Start-->
            <div class="SHOWDOW_BORDER TODAY_SEEIN">

                <?php

                $QUARY_BY_POSTS_SEE=SELECT_BY_QUARY("SELECT SUM(count) as count FROM contents;","count","2");

                $QUARY_BY_POSTS_SEE_ARRAY=preg_split("/\~/",$QUARY_BY_POSTS_SEE);

                ?>

                <div style="width: 100%;height: 100%;padding: 24px;">
                    <center>
                        <p style="font-size: 24px;"><?php echo $QUARY_BY_POSTS_SEE_ARRAY[0]; ?></p>
                        <p>تعداد بازدید از همه پست ها</p>
                    </center>
                </div>
            </div>
            <!--ALL SEE POSTS SEEIN BORDER End-->


            <!--ALL USERS SEEIN BORDER Start-->
            <div class="SHOWDOW_BORDER TODAY_SEEIN">

                <?php

                $QUARY_BY_ALL_USER=SELECT_BY_QUARY("SELECT COUNT(id) as count FROM users;","count","2");

                $QUARY_BY_ALL_USER_ARRAY=preg_split("/\~/",$QUARY_BY_ALL_USER);

                ?>

                <div style="width: 100%;height: 100%;padding: 24px;">
                    <center>
                        <p style="font-size: 24px;"><?php echo $QUARY_BY_ALL_USER_ARRAY[0]; ?></p>
                        <p>تعداد همه کاربران وب سایت</p>
                    </center>
                </div>
            </div>
            <!--ALL USERS SEEIN BORDER END-->







            <?php

                $QUARY_BY_ALL_USERS=SELECT_BY_QUARY("SELECT user FROM users WHERE permission=1 OR permission=2 OR permission=3","user","2");
                $QUARY_BY_ALL_USERS_ARRAY=preg_split("/\~/",$QUARY_BY_ALL_USERS);


                for($i=0;$i<count($QUARY_BY_ALL_USERS_ARRAY)-1;$i++)
                {

            ?>


                    <!--ALL USERS SEEIN BORDER Start-->
                    <div class="SHOWDOW_BORDER TODAY_SEEIN">

                        <?php

                        $QUARY_BY_COUNT_USER_POST=SELECT_BY_QUARY("SELECT COUNT(id) AS count FROM contents WHERE creator='$QUARY_BY_ALL_USERS_ARRAY[$i]';","count","2");

                        $QUARY_BY_COUNT_USER_POST_ARRAY=preg_split("/\~/",$QUARY_BY_COUNT_USER_POST);

                        ?>

                        <div style="width: 100%;height: 100%;padding: 24px;">
                            <center>
                                <p style="font-size: 24px;"><?php echo $QUARY_BY_COUNT_USER_POST_ARRAY[0]; ?></p>
                                <p><?php echo $QUARY_BY_ALL_USERS_ARRAY[$i];?> تعداد پست های  </p>
                            </center>
                        </div>
                    </div>
                    <!--ALL USERS SEEIN BORDER END-->



            <?php
                }
            ?>



        </div>


    </div>

</section>