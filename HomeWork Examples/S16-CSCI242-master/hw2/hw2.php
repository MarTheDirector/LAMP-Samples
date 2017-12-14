<!DOCTYPE html>
<html>
<head>
	<title>HW2</title>
</head>
<body>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="name">
    <input type="submit" value="Do POST">
 </form>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <input type="text" name="name">
    <input type="submit" value="Do GET">
 </form>


<?php

require_once("HTTPGetData.php");
require_once("HTTPPostData.php");

$getData = new HTTPGetData();
$postData = new HTTPPostData();

echo "GET key 'name': ", $getData->getKey("name");
echo "<br>";
echo "POST key 'name': ", $postData->getKey("name");


?>

</body>
</html>