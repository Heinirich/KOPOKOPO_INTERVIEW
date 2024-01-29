<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getAll()
    {
        return Transaction::all();
    }

    public function create(array $data)
    {
        // Create UUID if not provided

        if (!isset($data['account_id'])) {
            $data['account_id'] = Str::uuid();
        }

        return Transaction::create($data);
    }

    public function findByTransactionID($transaction_id)
    {
        return Transaction::where('account_id',$transaction_id)->first();
    }
}
