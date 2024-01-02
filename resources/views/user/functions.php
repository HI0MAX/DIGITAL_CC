function DataInsert(Request $request)
{   
    print_r($request->input());
    $request->validate([
    ]);

    $user = $request->user;
    $email = $request->email;
    $paper_size = $request->paper_size;
    $color_settings = $request->color_settings;
    $number_copies = $request->number_copies;
    $print_quality = $request->print_quality;
    $file = $request->file;

    $isInsertSuccess = DataCopy::insert(['user'=>$user,
                                        'email'=>$email,
                                        'paper_size'=>$paper_size,
                                        'color_settings'=>$color_settings,
                                        'number_copies'=>$number_copies,
                                        'print_quality'=>$print_quality,
                                        'file'=>$file
                                        ]);
    
    if($isInsertSuccess){echo'success','Your Registration has been successfull.';}
    else{ echo 'fieled','try again';}
}




// Printing request inputs for debugging purposes
    print_r($request->input());

    // Validating the request
    $request->validate([
        'user' => 'required',
        'email' => 'required|email',
        'paper_size' => 'required',
        'color_settings' => 'required',
        'number_copies' => 'required|integer|min:1',
        'print_quality' => 'required',
        'file' => 'required|file|mimes:pdf|max:2048', // Adjust file validation as needed 'required|file|mimes:pdf,doc,docx|max:2048'
    ]);

    // Retrieving values from the request
    $user = $request->input('user');
    $email = $request->input('email');
    $paperSize = $request->input('paper_size');
    $colorSettings = $request->input('color_settings');
    $numberCopies = $request->input('number_copies');
    $printQuality = $request->input('print_quality');
    $file = $request->file('file');

    // Inserting data into the database
    $isInsertSuccess = DataCopy::insert([
        'user' => $user,
        'email' => $email,
        'paper_size' => $paperSize,
        'color_settings' => $colorSettings,
        'number_copies' => $numberCopies,
        'print_quality' => $printQuality,
        'file' => $file->store('files'), // Adjust the storage path as needed
    ]);

    // Providing feedback based on the insertion result
    if ($isInsertSuccess){return response()->json(['status' => 'success', 'message' => 'Your registration has been successful. ']);}
    else                 {return response()->json(['status' => 'failed' , 'message' => 'Failed to insert data.Please try again.'], 500);}