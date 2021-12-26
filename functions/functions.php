<?php








//SERVER
//-------------------------------------------------------------------------------SERVER------------------------------------//
class CMS_SERVER
{
    public static $SERVER_ADDRESS="127.0.0.1";
    public static $SERVER_DB="database_masom_cms";
    public static $SERVER_USER="root";
    public static $SERVER_PASSWORD="";

    function GET_SERVER_ADDRESS()
    {
        return $this->SERVER_ADDRESS;
    }

    function GET_SERVER_DB()
    {
        return $this->SERVER_DB;
    }

    function GET_SERVER_USER()
    {
        return $this->SERVER_USER;
    }

    function GET_SERVER_PASSWORD()
    {
        return $this->SERVER_PASSWORD;
    }
}
//-------------------------------------------------------------------------------SERVER------------------------------------//
//SERVER






















//Public
//-------------------------------------------------------------------------------Public Functions------------------------------------//
function NOT_FOUND()
{
    header("location:404.php");
}


function LOG_IN_PANLE()
{
    header("location:index.php");
}


function NEW_POST_NAME()
{
    $myfile = fopen("../uploads/image_POSTs/Upload_Name_Post.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/image_POSTs/Upload_Name_Post.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_ITEM_NAME()
{
    $myfile = fopen("../uploads/image_ITEMs/Upload_Name_Item.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/image_ITEMs/Upload_Name_Item.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_SUB_ITEM_NAME()
{
    $myfile = fopen("../uploads/image_SUB_ITEMs/Upload_Name_SUB_Item.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/image_SUB_ITEMs/Upload_Name_SUB_Item.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_UPLOAD_FILE_NAME()
{
    $myfile = fopen("../uploads/Files/File_Name.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/Files/File_Name.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function Log_Persmission_To_Panle_1()
{
    $Permission=fopen("Permissions/Log_Panle.txt","w");
    fwrite($Permission,"1");
    fclose($Permission);
}


function Log_Persmission_To_Panle_0()
{

    $Permission=fopen("Permissions/Log_Panle.txt","r");
    $Val=fgets($Permission);
    fclose($Permission);

    $Permission=fopen("Permissions/Log_Panle.txt","w");
    fwrite($Permission,"0");
    fclose($Permission);


    return $Val;

}


function Get_All_Upload_Files()
{
    $Files="";

    $path = "../uploads/Files";

    $file=scandir($path);

    foreach ($file as $f)
    {
        if($f=="."||$f=="..")
            continue;
        $Files.=$f."~";
    }

    return $Files;

}


function HTML_Encrypt($value)
{
    $NEW_HTML=str_replace("<","!@##@!",$value);
    $NEW_HTML=str_replace(">","#@!!@#",$NEW_HTML);
    $NEW_HTML=str_replace("'","$$%%$$",$NEW_HTML);
    $NEW_HTML=str_replace("\n","",$NEW_HTML);
    $NEW_HTML=str_replace("\r","",$NEW_HTML);
    $NEW_HTML=str_replace("~","&*&&",$NEW_HTML);
    return $NEW_HTML;
}



function HTML_Decrypt($value)
{
    $NEW_HTML=str_replace("!@##@!","<",$value);
    $NEW_HTML=str_replace("#@!!@#",">",$NEW_HTML);
    $NEW_HTML=str_replace("$$%%$$","'",$NEW_HTML);
    return $NEW_HTML;
}

//Public
//-------------------------------------------------------------------------------Public Functions------------------------------------//




















//SELECT
//-------------------------------------------------------------------------------SELECT Functions------------------------------------//
function SELECT_BY_QUARY($SQL, $ROWS, $Spicial_Char)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;
    $rows=preg_split ("/\~/", $ROWS);
    $results="";

    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($SQL);

        if ($result->num_rows > 0)
        {

            while($row = $result->fetch_assoc())
            {


                if($Spicial_Char=="3")
                {
                    $Json=array();

                    for($a=0;$a<count($rows);$a++)
                        array_push($Json,$rows[$a]."~".$row[$rows[$a]]);

                    $results.=json_encode($Json);

                    $results=str_replace("~","\":\"",$results);

                    continue;
                }

                if($Spicial_Char=="1")
                    $results.="^";
                for($a=0;$a<count($rows);$a++)
                    $results.=($row[$rows[$a]]."~");
            }
        }
        else
        {
            // echo "0 results";
        }

        $conn->close();
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    return $results;

}
//-------------------------------------------------------------------------------SELECT Functions------------------------------------//
//SELECT

























//INSERT
//-------------------------------------------------------------------------------INSERT Functions------------------------------------//
//Insert To Contents Table Start
function INSERT_TO_CONTENT($title,$image,$html_code,$cat_id,$date,$creator,$visible_flag)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO contents(title, image, html_content, count,cat_id,date,creator,visible_flag) VALUES ('$title','$image','$html_code',0,$cat_id,'$date','$creator',$visible_flag)";

        if ($conn->query($sql) === TRUE)
        {
            echo "New record created successfully";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();

}
//Insert To Contents Table End











//Insert To Items_Menu Table Start
function INSERT_TO_ITEMS_MENU($title,$image,$creator,$visible_flag)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO menu_items(title,image,creator,visible_flag) VALUES ('$title','$image','$creator',$visible_flag)";

        if ($conn->query($sql) === TRUE)
        {
            echo "New record created successfully";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }
    $conn->close();


}
//Insert To Items_Menu Table End











//Insert To Items_Menu2 Table Start
function INSERT_TO_ITEMS_MENU2($title,$image,$cat_id,$creator,$visible_flag)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO menu_items2(title,image,cat_id,creator,visible_flag) VALUES ('$title','$image',$cat_id,'$creator',$visible_flag)";

        if ($conn->query($sql) === TRUE)
        {
            echo "New record created successfully";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }
    $conn->close();
}
//Insert To Items_Menu2 Table End











//Insert To Items_Menu2 Table Start
function INSERT_NEW_LOG($page_post)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;

    $IP="";
    $date = date('m/d/Y h:i:s a', time());



    try
    {
//        $IP = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $IP="127.0.0.1";
    }
    catch (Exception $ERR)
    {

    }



    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $PAGE_NAME=$actual_link."&".$page_post;



    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO logs(ip,page_name,date) VALUES ('$IP','$PAGE_NAME','$date')";

        if ($conn->query($sql) === TRUE)
        {
//            echo "New record created successfully";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }
    $conn->close();
}
//Insert To Items_Menu2 Table End











//Insert To Items_Menu2 Table Start
function INSERT_NEW_USER($user,$name,$family,$email,$phone,$passwordd,$sex,$enabled_type,$image,$permission,$datee)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;

    $IP="";
    $date = date('m/d/Y h:i:s a', time());



    try
    {
//        $IP = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $IP="127.0.0.1";
    }
    catch (Exception $ERR)
    {

    }



    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $PAGE_NAME=$actual_link;



    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (user,password,Name,Family,email,sex,image,phone,enable_flag,permission,date) VALUES('$user','$passwordd','$name','$family','$email','$sex','$image','$phone',$enabled_type,$permission,'$datee');";

        if ($conn->query($sql) === TRUE)
        {
//            echo "New record created successfully";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }
    $conn->close();
}
//Insert To Items_Menu2 Table End
//-------------------------------------------------------------------------------INSERT Functions------------------------------------//
//INSERT























//UPDATE
//-------------------------------------------------------------------------------UPDATE Functions------------------------------------//
//UPDATE To Contents TYPE 1 Table Start
function UPDATE_CONTENT($id,$title,$image,$html_code,$cat_id,$count,$visible)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="UPDATE contents SET id=$id";

        if($image!="")
        {
            $sql .= ",image='$image'";
        }

        if($html_code!="")
        {
            $sql.=",html_content='$html_code'";
        }

        if($count!="")
        {
            $sql .= ",count=$count";
        }


        if($title!="")
        {
            $sql .= ",title='$title'";
        }


        if($cat_id!="")
        {
            $sql .= ",cat_id=$cat_id";
        }


        if($visible!="")
        {
            $sql .= ",visible_flag=$visible";
        }



        $sql .= " WHERE id=$id;";




        if ($conn->query($sql) === TRUE)
        {

        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();

}









//UPDATE To Items_Menu Table Start
function UPDATE_ITEMS_MENU($id,$title,$image,$visible)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE menu_items SET title='$title'";


        if($image!=="")
            $sql.= ",image='$image'";

        if($visible!=="")
            $sql.= ",visible_flag=$visible";


        $sql.= " WHERE id=$id";

        if ($conn->query($sql) === TRUE)
        {

        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();

}
//UPDATE To Items_Menu Table End











//UPDATE To Items_Menu2 Table Start
function UPDATE_ITEMS_MENU2($id,$title,$image,$sub_id,$visible)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE menu_items2 SET title='$title'";

        if($image!=="")
            $sql.=",image='$image'";

        if($sub_id!=="")
            $sql.=",cat_id=$sub_id";

        if($visible!=="")
            $sql.=",visible_flag=$visible";


        $sql.= " WHERE id=$id";

        if ($conn->query($sql) === TRUE)
        {

        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();
}
//UPDATE To Items_Menu2 Table End











//UPDATE To Items_Menu2 Table Start
function UPDATE_USER_DETALES($id,$name,$familly,$email,$phone,$passwordd,$sex,$enabled_type,$image,$permission)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE users SET Name='$name'";

        if($image!=="")
            $sql.=",image='$image'";

        if($familly!=="")
            $sql.=",Family='$familly'";

        if($email!=="")
            $sql.=",email='$email'";

        if($phone!=="")
            $sql.=",phone='$phone'";

        if($passwordd!=="")
            $sql.=",password='$passwordd'";

        if($sex!=="")
            $sql.=",sex='$sex'";

        if($enabled_type!=="")
            $sql.=",enable_flag=$enabled_type";

        if($permission!=="")
            $sql.=",permission=$permission";




        $sql.= " WHERE id=$id";

        if ($conn->query($sql) === TRUE)
        {
            echo "OK";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();
}
//UPDATE To Items_Menu2 Table End

//-------------------------------------------------------------------------------UPDATE Functions------------------------------------//
//UPDATE









//DELETE
//-------------------------------------------------------------------------------DELETE Functions------------------------------------//

//UPDATE To Contents TYPE 1 Table Start
function DELETE_CONTENT($id)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="INSERT INTO contents_del (title,image,html_content,count,cat_id,date,creator,visible_flag) SELECT title,image,html_content,count,cat_id,date,creator,visible_flag FROM contents WHERE contents.id=$id";

        if ($conn->query($sql) === TRUE)
        {
            $sql="DELETE FROM contents WHERE id=$id";

            if ($conn->query($sql) === TRUE)
            {

            }
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();

}








//UPDATE To Items_Menu2 Table Start
function DELETE_ITEMS_MENU2($id)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="INSERT INTO menu_items2_del (title,image,cat_id,creator,visible_flag) SELECT title,image,cat_id,creator,visible_flag FROM menu_items2 WHERE id=$id";

        if ($conn->query($sql) === TRUE)
        {
            $sql="DELETE FROM menu_items2 WHERE id=$id";

            if ($conn->query($sql) === TRUE)
            {

            }
        }

    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();
}
//UPDATE To Items_Menu2 Table End








//UPDATE To Items_Menu Table Start
function DELETE_ITEMS_MENU($id)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="INSERT INTO menu_items_del (title,image,creator,visible_flag) SELECT title,image,creator,visible_flag FROM menu_items WHERE id=$id";

        if ($conn->query($sql) === TRUE)
        {
            $sql="DELETE FROM menu_items WHERE id=$id";

            if ($conn->query($sql) === TRUE)
            {

            }
        }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$sql . "<br>" . $e->getMessage();

    }

    $conn->close();

}
//UPDATE To Items_Menu Table End



//-------------------------------------------------------------------------------DELETE Functions------------------------------------//
//DELETE






?>