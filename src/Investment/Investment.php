<?php

namespace Klisostom\BackendTest\Investment;

use DateTime;
use Exception;
use Klisostom\BackendTest\User\User;

class Investment
{
    public function __construct(
        private User $user,
        private float $amount,
        private DateTime $creationDate,
    ) {
    }

    public function invalidDate()
    {
        if ($this->creationDate->format("Y-m-d") > date("Y-m-d")) {
            throw new Exception("An investment's creation date cannot be in the future.");
        }
    }
}
