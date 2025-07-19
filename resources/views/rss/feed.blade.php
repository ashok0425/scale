<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<rss version="2.0">
<channel>
    <title>Your Blog Title</title>
    <link>{{ url('/') }}</link>
    <description>Latest blog updates from your site</description>
    <language>en-us</language>
    <pubDate>{{ now()->toRfc2822String() }}</pubDate>

    @foreach ($posts as $post)
        <item>
            <title><![CDATA[{{ $post->title }}]]></title>
            <link>{{ route('blog.detail',['slug'=>$post->slug]) }}</link>
            <guid>{{ route('blog.detail',['slug'=>$post->slug]) }}</guid>
            <pubDate>{{ $post->created_at->toRfc2822String() }}</pubDate>
            <description><![CDATA[{!! Str::limit(strip_tags($post->content), 300) !!}]]></description>
        </item>
    @endforeach
</channel>
</rss>
