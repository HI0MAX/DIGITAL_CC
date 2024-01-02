@extends('layout/layout')

<script>
    function printPdf() {
        window.open('http://localhost/sql.pdf', '_blank');
    }

    function printPDF() {
    }
</script>


@section('space-work')
    <h2 class="mb-4">Admin</h2>




    <table class="table">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>paper_size</th>
        <th>color_settings</th>
        <th>number_copies</th>
        <th>print_quality</th>
        <th>Action</th>
    </tr>
    @foreach ($data0 as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->user }}</td>
            <td>{{ $data->paper_size }}</td>
            <td>{{ $data->color_settings }}</td>
            <td>{{ $data->number_copies }}</td>
            <td>{{ $data->print_quality }}</td>
            <td>
                <!-- Bootstrap Button -->
                <button type="button" class="btn btn-primary" onclick="printPDF('{{ asset($filePath) }}')">
                    PRINT
                </button>
            </td>
        </tr>
    @endforeach
</table>

<table class="table">

####################

    <div class="container mt-5">
        <h1 class="mb-4">VERIFICATION QR CODE</h1>
        <img src="{{ asset('http://localhost/qrcode/QRimg.png') }}" alt="qr code" class="img-fluid">
        <a href="http://localhost/qrcode/test.py" class="btn btn-primary" id="generateBtn">GENERATE</a>

    </div>

<script>
    function printPDF(filePath) {
        var pdfWindow = window.open(filePath, '_blank');
        pdfWindow.print();
    }
</script>

<script>
    $(document).ready(function() {
        $("#generateBtn").click(function() {
            // Make an AJAX request to your Python script
            $.ajax({
                url: "http://localhost/qrcode/test.py",
                method: "GET",
                success: function(response) {
                    // Handle the response from the server
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr, status, error);
                }
            });
        });
    });
</script>



    
@endsection
