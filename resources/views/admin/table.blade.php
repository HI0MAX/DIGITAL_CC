@extends('layout/layout')

@section('title', 'orders')
@section('space-work')

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hedvig Letters Serif">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <style>body {font-family: 'Hedvig Letters Serif', sans-serif;}</style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    






<style>
        /* Customize the appearance of the "Previous" and "Next" buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 0.75em;
            margin: 0;
            cursor: pointer;
            border: 1px solid #aaa;
            border-radius: 4px;
            user-select: none;
        }

        /* Style for the "Previous" button */
        .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            margin-right: 10px; /* Adjust as needed */
        }

        /* Style for the active page */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
</style>











</head>
<body>

    <table border="1" id="myTable" class="table" >
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Paper Size</th>
                <th>Color Settings</th>
                <th>Number of Copies</th>
                <th>Print Quality</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data0 as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->user }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->paper_size }}</td>
                <td>{{ $data->color_settings }}</td>
                <td>{{ $data->number_copies }}</td>
                <td>{{ $data->print_quality }}</td>
                <td>
                <button type="button" class="btn btn-primary" onclick="printPDF('{{ asset($filePath) }}')">
                    PRINT
                </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#myTable');</script>

    <script>
    function printPDF(filePath) {
        var pdfWindow = window.open(filePath, '_blank');
        pdfWindow.print();
    }
    </script>
   

</body>


@endsection




