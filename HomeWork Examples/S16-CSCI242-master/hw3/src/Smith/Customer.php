<?php

namespace Smith;

class Customer {
    
    protected $accounts = array();
    
    public function __construct()   // Constructor for Customer class
    {
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