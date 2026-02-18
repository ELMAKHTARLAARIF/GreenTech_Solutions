<?php

  abstract class Account{

    protected readonly string $accountNumber;

    public function __construct($accountNumber)
    {
        $this->accountNumber=$accountNumber;
    }

    public abstract function calculateFees();

}


class SavingsAccount extends Account{

    private string $dwqdqw;

    public function __construct($dwqdqw, $accountNumber)
    {
        $this->dwqdqw=$dwqdqw;
        parent::__construct($accountNumber);
    }

    public function calculateFees()
    {
        echo 'test';
    }
        
}

class CurrentAccount extends Account
{
    public function calculateFees()
    {
        echo 'tets2';
    }

}

interface Transactionable{
        public function deposit();

}
