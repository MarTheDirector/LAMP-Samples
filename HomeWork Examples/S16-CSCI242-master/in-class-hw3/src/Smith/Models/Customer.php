<?php

namespace Smith\Models;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ODM\Document
 */

class Customer {
    
    /**
     * @ODM\Id
     */
    
    protected $id;
    
    /**
     * @ODM\ReferenceMany(targetDocument="Account", cascade={"all"})
     */
    
    protected $accounts;
    
    public function __construct()   // Constructor for Customer class
    {
        $this->accounts = new ArrayCollection();
        $_SESSION[] = $this;
    }
    
    public function addAccount(BankAccount $account)    // Add bank account to $accounts array
    {
        $this->accounts[] = $account;
    }
    
    public function removeAccount(BankAccount $account) // Remove bank account from $accounts array
    {
        $key = array_search($account,$this->accounts);
        unset($this->accounts[$key]);
    }
    
    public function getAccounts()   // Return all accounts in $accounts array
    {
        return $this->accounts;
    }
    
    public function getBalanceOfAllAccounts()   // Return total balance of all accounts in $accounts array.
    {
        
        $totalBalance = 0;
        foreach($this->accounts as $account)
        {
            $totalBalance += $account->getBalance();
        }
        return $totalBalance;
    
    }
}