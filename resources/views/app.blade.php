<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    {{-- Inertia js stylying --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body class="bg-gray-200">
    @inertia
  </body>
</html>
