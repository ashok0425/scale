@php
 $pageUrl = request()->path();
    $seo = \App\Models\Seo::where('page_url', $pageUrl)->first();

@endphp

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
<meta property="og:image" content="{{ $seo?->og_image ?? getImage(cms()->logo) }}" />
<meta property="og:site_name" content="ScaleDux" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $seo?->meta_title ?? 'ScaleDux | Verified Marketplace to Hire, Fund & Get Mentored' }}" />
<meta name="twitter:description" content="{{ $seo?->meta_description ?? 'Hire trusted talent, connect with real investors, and get personalized mentorship — all in one verified platform built for founders and growing startups.' }}" />
<meta name="twitter:image" content="{{ $seo?->og_image ?? getImage(cms()->logo) }}" />
