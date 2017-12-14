<?php

namespace Smith;

class BankAccount {
    protected $balance = 0.00;
    
    public function __construct()   // Contructor for BankAccount class
    {
        
    }
    
    public function deposit($amount)    // Method to deposit new funds to $balance
    {
        if(!is_numeric($amount))
        {
            throw new AmountNotNumericException();
        }
        if($amount < 0)
        {
            throw new NegativeAmountException();
        }
        if($amount >= 10000)
        {
            throw new DepositToLargeException();
        }

        $this->balance += $amount;

    }
    
    public function withdrawal($amount) //Method to withdraw funds from balance
    {
        if(!is_numeric($amount))
        {
            throw new AmountNotNumericException();
        }
        if($amount < 0)
        {
            throw new NegativeAmountException();
        }        
        if($this->balance < $amount)
        {
            throw new InsufficientFundsException();  
        }

        $this->balance -= $amount;
    
    }
    
    public function getBalance()    // Method to return $balance
    {
        return $this->balance;
    }
}