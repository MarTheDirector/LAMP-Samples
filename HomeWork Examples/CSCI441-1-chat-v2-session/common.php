<?php
//Start the session
session_start();

	 $myhost = "daytona.birdnest.org";
        $mydbname = "my_besmera2";
        $myuser = "my.besmera2";
        $mypass = "CSCI355";

try
{
    $db = new PDO("mysql:host=$myhost;dbname=$mydbname", "$myuser", "$mypass");

    //Makes PDO throw exceptions for invalid SQL
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $ex)
{
	header("HTTP/1.1 500 MySQL Initialization Failed");
	if($mypass == "" || $myuser == "" || $mydbname == "" || $myhost == "")
 	{
		echo 'Did you forget to configure mysql variables $mypass, $myuser, $mydbname, or $myhost? ';
	}
	die($ex->getMessage());
}

function login()
{
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		//To avoid an implementation just having same user/pass is sufficent to demo
		if($_POST['username'] == $_POST['password']  && $_POST['username'] != "")
		{
			//Authenticated
			$_SESSION["username"] = $_POST['username'];
		}
		else
		{
			//Fail login
			header("HTTP/1.1 400 Bad Request - Invalid 'username' and 'password'.");
	                die();
		}
	}
	else
	{
		//Fail login
		header("HTTP/1.1 400 Bad Request - Must POST 'username' and 'password' to login.");
                die();
	}
}

function logout()
{
	//Just logout
	session_destroy();
}
