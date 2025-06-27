<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to ScaleDux</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9fafb;
      color: #222;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #7400e8;
    }
    p, li {
      font-size: 16px;
      line-height: 1.6;
    }
    ul {
      padding-left: 20px;
    }
    a {
      color: #7400e8;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .footer {
      font-size: 12px;
      color: #666;
      margin-top: 40px;
      border-top: 1px solid #ddd;
      padding-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container">

    <p>Hey {{ $firstName }},</p>

    <!-- Founder Message -->
    @if ($user_role === 'founder')
      <p>I’m Sunil — the founder of ScaleDux. Seeing your name on our early waitlist? Honestly, it means a lot. Thank you for believing in something that's still taking shape 🙏</p>
      <p>This is more than a sign-up. It's a sign of intent — the kind only a true builder has. And now,
you're officially part of a community that gets what that means.</p>
      <p>You’ve joined us at a raw and real moment — where every click, every early sign-up, and every
bit of faith helps lay the first bricks of a new kind of business platform. We’re not building "yet
another startup tool." We’re crafting a space where founders like you can find trusted talent,
raise capital without the chaos, and grow with mentorship that actually moves the needle. </p>
<p>
  Your presence here isn’t just a number. It’s a signal — that you're building with clarity, courage,
and conviction. And we see that.
</p>
<p>
    Here’s what you can look forward to:

</p>
      <ul>
        <li>Behind-the-scenes peeks at how ScaleDux is evolving</li>
        <li>Tools and guides made only for founders</li>
        <li>A personal invite to our early-user Discord space</li>
        <li>Stories from other builders like you</li>
        <li>Priority access to perks & beta features</li>
      </ul>

      <p>
        ScaleDux is not just another platform — it’s a growing community of real builders, dreamers,
and founders like you. People who believe in building with honesty, clarity, and purpose.
And we’re truly happy to have you with us. You belong here.

      </p>
      <p>
        When people ask how ScaleDux started, we’ll talk about the first 100 founders who showed
up early and built with us. Your name will be right there — as one of them
      </p>


    <h3>Let’s get you started:</h3>
    <ul>
      <li><a href="https://discord.gg/q2k9BtXx8N">Join our private Discord</a></li>
      <li><a href="https://www.scaledux.com/blogs">Read our latest blog post</a></li>
      <li><a href="{{url('priority-access')}}">Unlock your early-access perks</a></li>
    </ul>
    <p>
        Thank you once again for being early. You didn’t just show up — you stood up.
    </p>
    <p>
We’ll build this together — with clarity, care, and crazy passion</p>

    <p>I’ll be back in your inbox soon with something special just for early insiders like you. Until then, keep building.</p>

    <p>Warmly,<br><strong>Sunil Kumar Dash</strong><br>Founder, ScaleDux<br><a href="https://www.scaledux.com">www.scaledux.com</a></p>

    <!-- Freelancer/Agency Message -->
    @elseif ($user_role === 'freelancer' || $user_role === 'agency')
      <p>
        I’m Sunil — founder of ScaleDux. Just wanted to say a big thank you for showing up early. Truly
grateful to have you with us �
 ��
 ��
 ��
 ��
 ��
 ��.
 <br>
 <br>

It means a lot to know that talented freelancers and agencies like you are ready to be part of
something meaningful — a platform where your work gets the respect it deserves.
<br>
 <br>
You’re joining a platform where your time, skill, and craft are truly valued. A space built for
meaningful collaboration — where verified founders and growing businesses come looking for
long-term partners, not just short-term help.
      </p>
        <p>
            And because you’re here early, you’ll get a head start.
            <br>
 <br>
Here’s what’s coming your way:
        </p>
      <ul>
        <li>Sneak peeks into how ScaleDux is evolving</li>
        <li>Ready-to-use pitch decks, templates, and playbooks</li>
        <li>Invite to our early freelancer Discord group</li>
        <li>Early visibility when the platform goes live
</li>
        <li>First dibs on 0% commission perks and premium access
</li>
      </ul>

      <p>
        At ScaleDux, we do things the right way — with trust, transparency, and respect. Every project
here comes from a verified team that values your expertise, honours your time, and wants to
build something real with you.
<br>
No noise. No shortcuts. Just honest work, trusted teams, and real growth — the way it should
be.
<br>
Years from now, when ScaleDux is powering thousands of businesses, we’ll remember the
first 100 creators who believed before the world noticed. Your name will be etched in that
story.

      </p>

        <h3>Let’s get you started:</h3>
    <ul>
      <li><a href="https://discord.gg/q2k9BtXx8N">Join our private Discord</a></li>
      <li><a href="https://www.scaledux.com/blogs">Read our latest blog post</a></li>
      <li><a href="{{url('priority-access')}}">Unlock your early-access perks</a></li>
    </ul>

     <p>I’ll be back in your inbox soon with something special just for early insiders like you. Until then, keep building.</p>

    <p>Warmly,<br><strong>Sunil Kumar Dash</strong><br>Founder, ScaleDux<br><a href="https://www.scaledux.com">www.scaledux.com</a></p>

    <!-- Investor Message -->
    @elseif ($user_role === 'investor')
     <p>
        I’m Sunil — founder of ScaleDux. Delighted to welcome you to our early circle. Thank you �
 �
�
 ��
 ��
 ��
 ��
 ��
 for showing faith in what we’re building — your presence at this stage is a powerful signal that
we’re moving in the right direction.
<br>
<br>
You’re stepping into ScaleDux — a curated marketplace ecosystem built for clarity, trust, and
meaningful connections. A space where aligned founders and thoughtful investors meet —
without inbox noise, scattered pitches, or time lost on decks that don’t match your thesis.
ScaleDux is being built for those who believe investing isn’t just about capital — it’s about
timing, trust, and meaningful context. And here, you’ll find all three — streamlined, signal
rich, and founder-first
     </p>
      <ul>
        <li>Early access to our discovery engine</li>
        <li>Investor dashboards & filters</li>
        <li>Private Discord for early enablers</li>
        <li>Exclusive product demos & walkthroughs</li>
        <li>Lifetime benefits for early backers</li>
      </ul>

    <!-- Mentor Message -->
    @elseif ($user_role === 'mentor')
      <p>I’m Sunil — founder of ScaleDux. Thank you for joining our waitlist, and for showing intent to mentor with purpose.</p>
      <p>At ScaleDux, mentorship is a relationship — where your lived experience supports real founder growth.</p>
      <ul>
        <li>Early access to our mentorship tools</li>
        <li>Private Discord for mentors and founders</li>
        <li>Real feedback from mentees</li>
        <li>Priority access to founder matches</li>
        <li>Spotlight as a founding mentor</li>
      </ul>
    @endif

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
        <a href="{{url('unsubscribe')}}">Unsubscribe</a>
      </p>
    </div>
  </div>
</body>
</html>
