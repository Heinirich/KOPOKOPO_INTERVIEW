<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionControllerApiTest extends TestCase
{
    /**
     * Test retrieving a list of transactions.
     *
     * @return void
     */
    public function testRetrieveTransactions()
    {
        $response = $this->getJson('/api/transactions');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'account_id',
                    'amount',
                ],
            ]);
    }

    /**
     * Test creating a new transaction.
     *
     * @return void
     */
    public function testCreateTransaction()
    {
        $payload = [
            'account_id' => 'test_account_id',
            'amount' => 100.00,
        ];

        $response = $this->postJson('/api/transactions', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment($payload);
    }

    /**
     * Test retrieving a single transaction by ID.
     *
     * @return void
     */
    public function testRetrieveTransactionById()
    {
        // Assuming a transaction with ID 1 exists
        $response = $this->getJson('/api/transactions/1');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'account_id',
                'amount',
            ]);
    }


    /**
     * Test retrieving a Account ID.
     *
     * @return void
     */
    public function testRetrieveTransactionByAccountId()
    {
        // Assuming a transaction with ID 1 exists
        $response = $this->getJson('/api/accounts/63b3e1ba-320f-4cd9-ac23-5a67aea4268f');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'account_id',
                'amount',
            ]);
    }
}

