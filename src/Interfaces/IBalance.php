<?php

namespace Klisostom\BackendTest\Interfaces;

interface IBalance
{
    public function balance(array $investment): float;
}
