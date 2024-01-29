<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        return $this->transactionRepository->getAll();
    }

    public function store(Request $request)
    {
        return $this->transactionRepository->create($request->all());
    }
}
