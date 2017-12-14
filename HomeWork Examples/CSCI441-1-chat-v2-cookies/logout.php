<?php

require("common.php");

if($_SERVER['REQUEST_METHOD'] == "GET")
{
        logout();
}
else
{
        header("HTTP/1.1 400 Bad Request - Only GET is supported for logout.");
        die();
}

