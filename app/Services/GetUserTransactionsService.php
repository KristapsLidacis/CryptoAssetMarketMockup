<?php

namespace App\Services;

class GetUserTransactionsService
{
    public function execute()
    {
        return auth()->user()->transactions()->get();
    }
}
