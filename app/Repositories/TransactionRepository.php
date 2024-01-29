<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getAll()
    {
        return Transaction::all();
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function findByTransactionID($transaction_id)
    {
        return Transaction::where('account_id',$transaction_id)->first();
    }
}
