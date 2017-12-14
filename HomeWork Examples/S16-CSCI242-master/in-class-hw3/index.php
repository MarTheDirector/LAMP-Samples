<?php

require("bootstrap.php");

use Smith\Models\Customer;
use Smith\Models\BankAccount;

$customer1 = new Customer();

$account1 = new BankAccount();

$account2 = new BankAccount();

$customer1->addAccount($account1);

$customer1->addAccount($account2);

$account1->deposit(50);

$account2->deposit(100);

$dm->persist($customer1);

$dm->flush();