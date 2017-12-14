<?php
require("vendor/autoload.php");
use Smith\Customer;
use Smith\BankAccount;
use Smith\includes\header;
use Smith\includes\footer;

use Smith\InsufficientFundsException;
use Smith\DepositToLargeException;
use Smith\AmountNotNumericException;
use Smith\NegativeAmountException;

use \Exception;

require_once("src/Smith/includes/header.php"); 

$customer1 = new Customer();

$account1 = new BankAccount();
$account2 = new BankAccount();
$account3 = new BankAccount();
$customer1->addAccount($account1);
$customer1->addAccount($account2);
$customer1->addAccount($account3);

$account1->deposit(500);
$account3->deposit(50);

//Uncomment try catch lines to demonstrate exceptions
try
{
    $account2->deposit(150);
    //$account2->deposit("10I0");   // Catches amount not numeric exception 
    //$account2->deposit(-150);   // Catches negative amount exception
    //$account2->deposit(10001);  //Catches deposit too large exception
    
}
catch(AmountNotNumericException $ex)
{
    echo "Please enter a numeric number.";
}
catch(NegativeAmountException $ex)
{
    echo "Accounts do not accept negative values.";
}
catch(DepositToLargeException $ex)
{
    echo 'If you wish to desposit more than $10,000, then it will require special handling.';
}
catch(Exception $ex)
{
    echo "There was an error. Our development team has been notified";
}


try 
{
   
   $account2->withdrawal(100);
   //$account2->withdrawal("11i"); // Catches amount not numeric exception
   //$account2->withdrawal(-100);    // Catches negative amount exception
   //$account2->withdrawal(200);      //Catches insufficient funds exception
    
}
catch(AmountNotNumericException $ex)
{
    echo "Please enter a numeric number.";
}
catch(NegativeAmountException $ex)
{
    echo "Accounts do not accept negative values.";
}        
catch (InsufficientFundsException $ex ) 

{
    echo "You do not have enough funds.";
}
catch(Exception $ex)
{
    echo "There was an error. Our development team has been notified";
}        



require_once("src/Smith/includes/footer.php");        
