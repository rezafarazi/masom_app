<?php


class CMS_SERVER
{
    public static $SERVER_ADDRESS="127.0.0.1";
    public static $SERVER_DB="cms_test";
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



?>