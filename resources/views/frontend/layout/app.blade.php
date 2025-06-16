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

    <link rel="stylesheet" crossorigin href="{{asset('frontend/assets/main.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @stack('style')
    @yield('seo')
    <style>
        .after\:bg-no-repeat:after{
            z-index: -1!important;
        }
        html,body{
            scroll-behavior: smooth;
        }
    </style>
  </head>
  <body>
    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')
    <script type="module" crossorigin src="{{asset('frontend/assets/main.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if (session()->has('message'))
        Toastify({
  text: "{{session()->get('message')}}",
  className: "error",
   duration: 4000,
  style: {
    background: "{{session()->get('type')=='error'?'red':'green'}}",
  }
}).showToast();
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            Toastify({
                text: @json($error),
                style: {
                    background: "red",
                    color: "#fff"
                },
                duration: 4000,
                gravity: "top",
                position: "right",
                close: true,
            }).showToast();
        @endforeach
    @endif
</script>

  </body>
</html>
