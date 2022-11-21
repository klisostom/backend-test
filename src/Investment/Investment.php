<?php

namespace Klisostom\BackendTest\Investment;

use DateTime;
use Exception;
use Klisostom\BackendTest\Interfaces\IInvestment;
use Klisostom\BackendTest\Owner\Owner;
use Klisostom\BackendTest\Owner\OwnerRepository;

class Investment implements IInvestment
{
    public function __construct(
        private Owner $owner,
        private float $amount,
        private DateTime $creationDate,
    ) {
    }

    public function isValidDate()
    {
        $isValid = true;
        return $this->creationDate->format("Y-m-d") > date("Y-m-d") ?
            throw new Exception("An investment's creation date cannot be in the future.") :
            $isValid;
    }

    public function isValidAmount()
    {
        $nothing = 0;
        $isValid = true;

        return $this->amount < $nothing ?
            throw new Exception("An investment's amount cannot be negative.") :
            $isValid;
    }

    public function makeIvestment()
    {
        if ($this->isValidAmount() && $this->isValidDate()) {
            (new OwnerRepository)->create([
                'owner' => $this->owner,
                'amount' => $this->amount,
                'creationDate' => $this->creationDate,
            ]);
        }
    }
}
