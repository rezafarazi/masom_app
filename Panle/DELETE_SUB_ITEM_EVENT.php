<?php

include "Check.php";
DELETE_ITEMS_MENU2($_POST['DELETE_TITLE_UPDATE_SUB_ITEM']);
echo "<script> window.location = 'Panle.php#update_sub_item'; </script>";

?>