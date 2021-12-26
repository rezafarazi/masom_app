<section>

    <?php

        $POST_ID=$_REQUEST['Post_id'];

        $DATA=SELECT_BY_QUARY("SELECT * FROM contents WHERE id=$POST_ID;","id~title~image~html_content",0);

        $INFORMATION=preg_split("/\~/",$DATA);

        $INFORMATION=HTML_Decrypt($INFORMATION);

        echo "$INFORMATION[3]";

    ?>

</section>