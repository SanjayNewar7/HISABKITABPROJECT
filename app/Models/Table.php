<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default naming convention
    protected $table = 'tables'; // Change 'tables' to your actual table name if different

    // Define which attributes are mass assignable
    protected $fillable = [
        'table_number', // Make sure these match the column names in your database
        'capacity',
        'table_status',
    ];
}
