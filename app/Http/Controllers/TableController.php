<?php

// app/Http/Controllers/TableController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function showTable()
    {
        $tableData = DB::table('data_copy')->get(); // Replace 'your_table_name' with your actual table name

        return view('admin/table', ['data0' => $tableData]);
    }
}
