<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;

class Transactions_Controller extends Controller
{
    // Display a listing of transactions
    public function index()
    {
        // Fetch all transactions
        $transactions = Transaction::all();

        // Pass the transactions to the view
        return view('transactions.index', compact('transactions'));
    }

    // Show the form for creating a new transaction
    public function create()
    {
        // Get all materials and users for the dropdowns
        $materials = Material::all();
        $users = User::all();

        return view('transactions.create', compact('materials', 'users'));
    }

    // Store a newly created transaction in the database
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'type' => 'required|in:add,deduct',
            'quantity' => 'required|integer|min:1',
            'performed_by' => 'required|exists:users,id',
        ]);

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->material_id = $request->material_id;
        $transaction->type = $request->type;
        $transaction->quantity = $request->quantity;
        $transaction->performed_by = $request->performed_by;
        $transaction->save();

        // Redirect to the transactions index with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully');
    }

    // Display the specified transaction
    public function show($id)
    {
        // Fetch the transaction by ID
        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }

    // Show the form for editing the specified transaction
    public function edit($id)
    {
        // Fetch the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Get all materials and users for the dropdowns
        $materials = Material::all();
        $users = User::all();

        return view('transactions.edit', compact('transaction', 'materials', 'users'));
    }

    // Update the specified transaction in the database
    public function update(Request $request, $id)
    {
        // Validate input data
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'type' => 'required|in:add,deduct',
            'quantity' => 'required|integer|min:1',
            'performed_by' => 'required|exists:users,id',
        ]);

        // Fetch the transaction to be updated
        $transaction = Transaction::findOrFail($id);
        $transaction->material_id = $request->material_id;
        $transaction->type = $request->type;
        $transaction->quantity = $request->quantity;
        $transaction->performed_by = $request->performed_by;
        $transaction->save();

        // Redirect to the transactions index with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    // Remove the specified transaction from the database
    public function destroy($id)
    {
        // Fetch the transaction to be deleted
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        // Redirect to the transactions index with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
