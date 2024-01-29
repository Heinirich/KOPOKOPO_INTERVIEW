<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function findByTransactionID($transaction_id);
}
