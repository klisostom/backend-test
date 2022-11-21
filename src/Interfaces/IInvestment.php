<?php

namespace Klisostom\BackendTest\Interfaces;

interface IInvestment
{
    public function makeIvestment();
    public function isValidDate();
    public function isValidAmount();
}
