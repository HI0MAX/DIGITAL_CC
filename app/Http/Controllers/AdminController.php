<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


use App\Models\DataCopy;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard_o()
    {
        return view('admin.dashboard-o');
    }


    public function dataAndPdf()
    {
        $data0 = DataCopy::all();    
        $filePath = Storage::url('pdf/' . 'sql.pdf');
        
        return view('admin.dashboard', compact('data0', 'filePath'));
        
    }  
    public function dataAndPdf0()
    {
        $data1 = DataCopy::query()->where('paper_size')->orderBy('number_copies','desc')->get();
        
        return view('admin.dashboard', compact('data1'));
        
    }    

    public function showTable()
    {
        $tableData = DB::table('data_copy')->get(); // Replace 'your_table_name' with your actual table name
        $filePath = Storage::url('pdf/' . 'sql.pdf');

        return view('admin/table',['data0' => $tableData], compact('filePath'));
    }
}
