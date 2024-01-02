<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DataCopy;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;



class DashboardController extends Controller
{
    function dashboardIndex(){
        return view("dashboard");
    }


/**

 */

function DataInsert(Request $request)
{   
    // Printing request inputs for debugging purposes...........
    #print_r($request->input());
    // Validating the request.......
    $request->validate([
    ]);



    // Retrieving values from the request
    $user = $request->input('user');
    $email = $request->input('email');
    $paperSize = $request->input('paper_size');
    $colorSettings = $request->input('color_settings');
    $numberCopies = $request->input('number_copies');
    $printQuality = $request->input('print_quality');
    $file = $request->file('file');
    $path =asset('storage/pdf/'. $file);

    // Inserting data into the database
    $isInsertSuccess = DataCopy::insert([
        'user' => $user,
        'email' => $email,
        'paper_size' => $paperSize,
        'color_settings' => $colorSettings,
        'number_copies' => $numberCopies,
        'print_quality' => $printQuality,
        'file' => $path, // Adjust the storage path as needed
    ]);

    
    // Providing feedback based on the insertion result
    if ($isInsertSuccess) {
        
        // Print request input for debugging
        print_r($request->input());
    
        // Introduce a delay of 5 seconds
        sleep(2);

        $user = auth()->user(); // Si l'utilisateur est connecté
        Mail::to($user->email)->send(new OrderConfirmation($isInsertSuccess));
         
        // Redirect to 'dashboard' after the delay
        return           back()->with('message','Success! Your operation was completed successfully');
    }
    
    else                 {return response()->json(['status' => 'failed' , 'message' => 'Failed to insert data.Please try again.'], 500);}
}

}




