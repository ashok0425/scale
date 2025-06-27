<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ScaleDux Waitlist Confirmation</title>
</head>
<body>


<p>Hi {{ $firstName }},</p>

@php
      $page=App\Models\Page::where('type',2)->where('name','waitlist')->where('slug',$user_role)->first();

@endphp

@if ($page)
    {!!$page->description!!}
@endif

<br>

 <div class="footer">
      <p>
        ScaleDux Software Innovations Pvt Ltd<br>
        Registered under the Companies Act, 2013<br>
        Bengaluru, Karnataka – 560001, India<br>
        CIN: U62013OD2025PTC049049<br>
        📞 +91 9606626500 | 🌐 <a href="https://www.scaledux.com">scaledux.com</a> | ✉ <a href="mailto:contact@scaledux.com">contact@scaledux.com</a>
      </p>
      <p>
        You’re receiving this because you joined the ScaleDux waitlist or used our startup tools.<br>
        <a href="{{ url('privacy-policy') }}">Privacy Policy</a> |
        <a href="{{ url('terms-of-services') }}">Terms of Service</a> |
        <a href="{{route('unsubscribe',['uuid'=>$uuid])}}">Unsubscribe</a>
      </p>
    </div>
</body>
</html>
