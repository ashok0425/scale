<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Hubot+Sans:ital,wdth,wght@0,75..125,200..900;1,75..125,200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
    <title>ScaleDux</title>
    <script type="module" crossorigin src="{{asset('frontend/assets/main.js')}}"></script>
    <link rel="stylesheet" crossorigin href="{{asset('frontend/assets/main.css')}}">
  </head>
  <body>
    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')

  </body>
</html>
