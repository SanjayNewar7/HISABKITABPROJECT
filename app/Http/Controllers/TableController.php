<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    public function create()
    {
        return view('tables');
    }

    public function store(Request $request)
    {
        // Validate the form data for a single table submission
        $data = $request->validate([
            'tableNumber' => 'required|integer|min:1',
            'tablecapacity' => 'required|integer|min:1',
            'tableStatus' => 'required|string|in:Available,Occupied,Reserved',
        ]);

        // Insert the table data into the database
        Table::create([
            'table_number' => $data['tableNumber'],
            'capacity' => $data['tablecapacity'],
            'table_status' => $data['tableStatus'],
        ]);

        // Redirect back with a success message
        return redirect()->route('viewtable')->with('success', 'Table added successfully!');
    }



    public function index()
    {
        $tableData = Table::select('table_number', 'capacity', 'table_status')->get();
        return view('viewtable', compact('tableData')); // <-- THIS LINE
    }
}
