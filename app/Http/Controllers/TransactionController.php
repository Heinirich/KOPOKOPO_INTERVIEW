<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }


    /**
     * @OA\Get(
     *     path="/transactions",
     *     summary="Retrieve transactions",
     *     description="Retrieve a list of transactions",
     *     @OA\Response(
     *         response=200,
     *         description="A list of transactions",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Transaction")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $transactions =  $this->transactionRepository->getAll();

        // Format response to OPENAPI format
        $formattedTransactions = $transactions->map(function ($transaction) {
            return [
                'account_id' => $transaction->account_id,
                'amount' => $transaction->amount
            ];
        });

        return response()->json($formattedTransactions)
            ->setStatusCode(200, "A list of transactions");
    }

    /**
     * @OA\Post(
     *     path="/transactions",
     *     summary="Create a new transaction",
     *     description="Create a new transaction entry",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Transaction")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(ref="#/components/schemas/Transaction")
     *     )
     * )
     */
    public function store(TransactionRequest $request)
    {
        $createdTransaction = $this->transactionRepository->create($request->all());

        return response()->json($createdTransaction)
            ->setStatusCode(201, "Transaction created");
    }


    public function show($transaction_id)
    {
        $transaction = $this->transactionRepository->findByID($transaction_id);

        if (!$transaction) {
            return response()->json(['error' => 'Transaction not found.'], 404);
        }

        return response()->json($transaction);
    }
}
