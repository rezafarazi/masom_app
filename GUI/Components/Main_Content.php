<?php
//Checker Start

$text="";

if(isset($_REQUEST['page_num']))
{
    $Page_Num = $_REQUEST['page_num'];
    if ($Page_Num == '1')
    {
        $text = SELECT_BY_QUARY("SELECT DISTINCT menu_items.id,menu_items.title,menu_items.image,menu_items2.id FROM menu_items INNER JOIN menu_items2 ON menu_items.id=menu_items2.cat_id", 'id~title~image~id', "1");
    }
    else if ($Page_Num == '2')
    {
        $cat_id = $_REQUEST['cat_id'];

        if ($cat_id != "")
        {
            $text = SELECT_BY_QUARY("SELECT DISTINCT menu_items2.id,menu_items2.title,menu_items2.image,contents.cat_id FROM menu_items2 INNER JOIN contents ON menu_items2.id=contents.cat_id WHERE contents.cat_id=$cat_id", 'id~title~image~cat_id', "1");
        }
        else
        {
            NOT_FOUND();
        }
    }
    else if ($Page_Num == '3')
    {
        $cat_id = $_REQUEST['cat_id'];

        if ($cat_id != "")
        {
            $text = SELECT_BY_QUARY("SELECT contents.id,contents.title,contents.image FROM menu_items2 INNER JOIN contents ON menu_items2.id=contents.cat_id WHERE contents.cat_id=$cat_id", 'id~title~image', "1");
        } else
        {
            NOT_FOUND();
        }
    }
    else
    {
        NOT_FOUND();
    }

}
else
{

    echo "<script> window.location='index.php?page_num=1'; </script>";
}


$rows=preg_split("/\^/",$text);

//Checker End
?>


<!--Main Content Start-->
<section id="MAIN_CONTENT_LAYOUT">


    <div class="Main_Content container-fluid">


        <div class="columns is-multiline is-mobile" style="margin: -9px 5px 5px 5px;">


            <?php

            //Start Loop
            for($Counter=1;$Counter<count($rows);$Counter++)
            {

                $feildes=preg_split("/\~/",$rows[$Counter]);


                ?>
                <!--Item Example Start-->
                <div unselectable="on" class="column is-light is-half" style="padding:0.75rem 0px 0.75rem 0px !important;">

                    <a href="<?php  if($Page_Num==1){echo "index.php?sec=1020315100060161617181920&page_num=2&cat_id=".$feildes[3];}else if($Page_Num==2){echo "index.php?sec=1020315100060161617181920&page_num=3&cat_id=".$feildes[3];}else{echo "Single.php?sec=1020315100060161617181920&Post_id=".$feildes[0];}?>">

                        <center>

                            <div class="item">

                                <div class="bg-img" style="background: url('<?php echo $feildes[2];?>');">

                                    <div style="height: 87%;width: 100%"></div>

                                    <h3><?php echo $feildes[1]; ?></h3>

                                </div>

                            </div>

                        </center>

                    </a>

                </div>
                <!--Item Example End-->

                <?php

            }
            //End Loop
            //
            ?>

        </div>


    </div>

</section>
<!--Main Content End-->



</section>