<?php

require("GeoIP.php");



$myinfo = new GeoIP($_SERVER["HTTP_X_FORWARDED_FOR"]);

?>

<h1>Welcome  <?php echo $myinfo->getIp(); ?></h1>
<p>How is the weather in <?php echo $myinfo->getCity() . " " . $myinfo->getState(); ?></p>