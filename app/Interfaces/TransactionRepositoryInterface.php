<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function findByID($transaction_id);

    public function findByAccountID($account_id);
}
