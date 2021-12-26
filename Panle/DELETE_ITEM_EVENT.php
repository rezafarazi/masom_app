<?php

include "Check.php";

DELETE_ITEMS_MENU($_POST['DELETE_TITLE_UPDATE_ITEM']);

echo "<script> window.location = 'Panle.php#update_item'; </script>";

?>