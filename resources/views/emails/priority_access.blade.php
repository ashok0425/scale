<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ScaleDux Priority Access Confirmation</title>
  <style>
    body { font-family: Arial, sans-serif; background: #ffffff; color: #333; padding: 20px; }
    a { color: #1a73e8; text-decoration: none; }
    ul { padding-left: 20px; }
    .footer { font-size: 12px; color: #777; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 15px; }
  </style>
</head>
<body>

<p>Hi {{ $firstName }},</p>

@php
    $page=Page::where('type','2')->where('name',$user_role)->where('slug','priority-access')->first();

@endphp

@if ($page)
    {!!$page->description!!}
@endif

</body>
</html>
