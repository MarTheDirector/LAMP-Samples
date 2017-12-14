<?php

require("vendor/autoload.php");

?>
<form method="GET" action="index.php">
    <input type="text" name="symbol"/>
    <input type="submit" value="Submit"/>
</form>
<?php

$client = new \Scheb\YahooFinanceApi\ApiClient();   //Could of used namespace and done new ApiClient();

$data = $client->getQuotesList($_GET["symbol"]);    //Could of used getQuotes method
//var_dump($data["query"]["results"]["quote"]);
$symbol = $data["query"]["results"]["quote"]["symbol"];
$lastTradePrice = $data["query"]["results"]["quote"]["LastTradePriceOnly"];
//echo $data;
echo $symbol . " is currently at $" . $lastTradePrice;