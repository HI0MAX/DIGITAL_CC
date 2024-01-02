<!-- resources/views/print/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Print PDF</title>
</head>
<body>
    <embed src="{{ asset($filePath) }}" type="application/pdf" width="100%" height="600px">


    <!-- Add a button to trigger the print functionality -->
    <button onclick="printPdf()">Print PDF</button>

</body>
</html>

