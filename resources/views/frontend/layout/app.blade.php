
    @php
 $pageUrl = request()->path();
    $seo = \App\Models\Seo::where('page_url', $pageUrl)->first();

@endphp
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


<title>{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}</title>

<meta name="description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}">
<meta name="keywords" content="{{ $seo?->meta_keywords ?? 'startup marketplace, find trusted freelancers, connect with investors, early stage startup funding, find mentors for startups, freelance for startups, startup launch toolkit, startup service providers India, scaledux' }}">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="{{ url()->current() }}" />

<!-- Open Graph / Facebook -->
<meta property="og:title" content="{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}" />
<meta property="og:description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ getImage($seo?->thumbnail) ?? getImage(cms()->logo) }}" />
<meta property="og:site_name" content="ScaleDux" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}" />
<meta name="twitter:description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}" />
<meta name="twitter:image" content="{{ getImage($seo?->thumbnail) ?? getImage(cms()->logo) }}" />


    <link rel="stylesheet" crossorigin href="{{asset('frontend/assets/main.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @stack('style')

    <style>
        .after\:bg-no-repeat:after{
            z-index: -1!important;
        }
        html,body{
            scroll-behavior: smooth;
        }

        select {

}

/* The custom arrow using a background SVG */
select {
  background-image: url("data:image/svg+xml,%3Csvg fill='none' stroke='%236B7280' stroke-width='2' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M6 9l6 6 6-6'%3E%3C/path%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.75rem center;
  background-size: 1.25rem 1.25rem;
}
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

  </head>
  <body>
    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')


   <script type="application/ld+json">
{!! json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => "ScaleDux",
    "url" => url('/'),
    "description" => $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.',
    "publisher" => [
        "@type" => "Organization",
        "name" => "ScaleDux Software Innovations Pvt Ltd",
        "url" => url('/')
    ],
    "keywords" => explode(',', $seo?->meta_keywords ?? 'startup marketplace, find trusted freelancers, connect with investors, early stage startup funding, find mentors for startups, freelance for startups, startup launch toolkit, startup service providers India, scaledux'),
    "inLanguage" => "en"
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

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

@stack('script')

  </body>
</html>
