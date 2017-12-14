<?php

require("common.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
        login();
}
else
{
	header("HTTP/1.1 400 Bad Request - Only POST is supported for login.");
	die();
}

