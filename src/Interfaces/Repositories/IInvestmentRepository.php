<?php

namespace Klisostom\BackendTest\Interfaces\Repositories;

use Klisostom\BackendTest\Investment\Investment;

interface IInvestmentRepository
{
    public function create(): Investment;
}
