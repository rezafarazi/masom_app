



<!--<script src="GUI/js/bootstrap.min.js"></script>-->
<!--<script src="GUI/js/owl.carousel.min.js"></script>-->
<!--<script src="GUI/js/aos.js"></script>-->
<!--<script src="GUI/js/jquery-3.2.1.min.js"></script>-->
<!--<script src="GUI/js/jquery.magnific-popup.min.js"></script>-->
<!--<script src="GUI/js/jquery.waypoints.min.js"></script>-->
<!--<script src="GUI/js/popper.min.js"></script>-->
<!--<script src="GUI/js/main.js"></script>-->
<!--<script src="GUI/js/magnific-popup-options.js"></script>-->




<?php

    $page_url_methods="";

    if(isset($_REQUEST['page_num']))
    {
        $page_url_methods.="page_num=".$_REQUEST['page_num']."&";
    }
    else if(isset($_REQUEST['Post_id']))
    {
        $page_url_methods.="Post_id=".$_REQUEST['Post_id']."&";
    }

    INSERT_NEW_LOG($page_url_methods);

?>


</body>
</html>