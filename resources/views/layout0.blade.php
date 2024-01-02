<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hedvig Letters Serif">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">


    <style>body {font-family: 'Hedvig Letters Serif', sans-serif;}</style>
  </head>
  <body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>
