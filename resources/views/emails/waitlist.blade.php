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
    $page=Page::where('type','2')->where('name',$user_role)->where('slug','waitlist')->first();
@endphp

@if ($page)
    {!!$page->description!!}
@endif
</body>
</html>
