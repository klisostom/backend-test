<?php

namespace Klisostom\BackendTest\Balance;

use DateTime;
use Exception;

class Balance
{
    private const GAIN = 0.52;

    public function balance(array $investment): float
    {
        $creationDate = $investment[0]['creation_date'];
        $amount = $investment[0]['amount'];
        $days = $this->calcDateSoFar($creationDate);

        $expectedBalance = $amount + ($amount * $this->calcGain($days));
        // (new BalanceRepository)->create($expectedBalance, $investment[0]['id']);
        (new BalanceRepository)->create(501, 42);
        return $expectedBalance;
    }

    private function calcDateSoFar($creationDate): int|false
    {
        $date = new DateTime($creationDate);
        return $date->diff(new DateTime())->days;
    }

    private function calcGain($days): float
    {
        $result = round(num: ($days / 30), mode: PHP_ROUND_HALF_DOWN);
        return $result * self::GAIN;
    }
}
