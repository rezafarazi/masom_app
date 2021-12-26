<?php



include "../../../functions/functions.php";





session_start();



$login_flag=0;



if($login_flag==0)
{

    if(isset($_POST['UserName_PANLE']))
    {
        $user_name = $_POST['UserName_PANLE'];
        $pass_word = $_POST['PassWord_PANLE'];
    }
    else
    {
        $user_name=$_SESSION['Username'];
        $pass_word=$_SESSION['Password'];
    }


    if($user_name==""||$pass_word=="")
    {
        header("location:../../index.php");
    }

    $users=SELECT_BY_QUARY("SELECT * FROM users","id~user~password~enable_flag~permission",1);
    $users_array=preg_split("/\^/",$users);


    //Check Log in Start
    for($i=1;$i<count($users_array);$i++)
    {

        $a_user_array=preg_split("/\~/",$users_array[$i]);

        if($a_user_array[1]==$user_name && $a_user_array[2]==$pass_word && $a_user_array[3]=="1" && (int)$a_user_array[4]==1)
        {
            $login_flag=1;
            $_SESSION['Username']=$user_name;
            $_SESSION['Password']=$pass_word;
            $_SESSION['Permission']=$a_user_array[4];
            break;
        }

    }
    //Check Log in End
}



if($login_flag==0)
{
    header("location:../../index.php");
}




?>