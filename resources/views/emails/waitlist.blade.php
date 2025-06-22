<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Thank You for Joining the ScaleDux Waitlist</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      line-height: 1.5;
      margin: 0;
      padding: 0 20px;
      background-color: #fafafa;
    }
    h1, h2, h3, h4 {
      color: #7400e8;
      margin-top: 1.2em;
      margin-bottom: 0.5em;
    }
    a {
      color: #7f04ff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .footer {
      font-size: 12px;
      color: #999;
      margin-top: 40px;
      border-top: 1px solid #eee;
      padding-top: 10px;
    }
    ul {
      list-style: inside disc;
      margin: 0 0 1.5em 0;
      padding: 0;
    }
    p, li {
      margin-bottom: 0.75em;
    }
  </style>
</head>
<body>

  <p>Hi {{ $firstName }},</p>

  @if ($role === 'founder')

    <p>I’m Sunil — the founder of ScaleDux. Seeing your name on our early waitlist? Honestly, it means a lot.</p>

    <p>Thank you for believing in something that's still taking shape. This is more than a sign-up. It's a sign of intent — the kind only a true builder has.</p>

    <p>You’re now part of a community that truly understands what building with purpose means.</p>

    <p>You’ve joined us at a raw and real moment — where every early sign-up and bit of faith helps lay the foundation of a new kind of business platform. We’re not building just another startup tool; we’re crafting a space where founders like you can find trusted talent, raise capital without chaos, and grow with mentorship that moves the needle.</p>

    <p>Your presence isn’t just a number. It’s a signal — that you’re building with clarity, courage, and conviction. And we see that.</p>

    <h3>Here’s what you can look forward to:</h3>
    <ul>
      <li>Behind-the-scenes peeks at how ScaleDux is evolving</li>
      <li>Tools and guides made just for founders</li>
      <li>A personal invite to our early-user Slack space</li>
      <li>Stories from other builders in the same exciting phase</li>
      <li>Priority access to perks, beta features, and pilot collaborations</li>
    </ul>

    <p>ScaleDux isn’t just another platform — it’s a community of real builders, dreamers, and founders who believe in building with honesty, clarity, and purpose. And we’re truly happy to have you with us. You belong here.</p>

    <p>When people ask how ScaleDux started, we’ll talk about the first 100 founders who showed up early and built with us. Your name will be right there — as one of them.</p>

    <h3>Let’s get you started:</h3>
    <ul>
      <li><a href="[Slack Link]">Join our private Slack</a></li>
      <li><a href="[Blog Link]">Read our latest founder blog</a></li>
      <li><a href="[Perks Link]">Unlock your early-access perks</a></li>
    </ul>

    <p>Thank you once again for being early. You didn’t just show up — you stood up.</p>
    <p>We’ll build this together — with clarity, care, and passion.</p>

  @elseif ($role === 'freelancer')

    <p>I’m Sunil — founder of ScaleDux. Thank you for showing up early. It means a lot to know talented freelancers and agencies like you are ready to be part of something meaningful.</p>

    <p>You’re joining a platform where your time, skill, and craft are truly valued. A space built for meaningful collaboration — where verified founders seek long-term partners, not just short-term gigs.</p>

    <p>Because you’re here early, you get a head start.</p>

    <h3>Here’s what’s coming your way:</h3>
    <ul>
      <li>Sneak peeks into how ScaleDux is evolving</li>
      <li>Ready-to-use pitch decks, templates, and playbooks</li>
      <li>Invite to our early freelancer Slack group</li>
      <li>Early visibility when the platform goes live</li>
      <li>First dibs on 0% commission perks and premium access</li>
    </ul>

    <p>At ScaleDux, we do things the right way — with trust, transparency, and respect. Every project comes from a verified team that values your expertise, honors your time, and wants to build something real with you.</p>

    <p>No noise. No shortcuts. Just honest work, trusted teams, and real growth — the way it should be.</p>

    <p>Years from now, when ScaleDux powers thousands of businesses, we’ll remember the first 100 creators who believed before the world noticed. Your name will be etched in that story.</p>

    <h3>Let’s get you started:</h3>
    <ul>
      <li><a href="[Slack Link]">Join our private Slack</a></li>
      <li><a href="[Blog Link]">Read our latest blog post</a></li>
      <li><a href="[Perks Link]">Unlock your early-access perks</a></li>
    </ul>

    <p>Thanks again for trusting us early. We’re building this together — and we’re so glad you’re with us.</p>

  @elseif ($role === 'investor')

    <p>I’m Sunil — founder of ScaleDux. Thank you for joining our early circle and showing faith in what we’re building. Your presence at this stage is a powerful signal that we’re moving in the right direction.</p>

    <p>You’re stepping into ScaleDux — a curated marketplace ecosystem built for clarity, trust, and meaningful connections. A space where aligned founders and thoughtful investors meet — without inbox noise, scattered pitches, or wasted time.</p>

    <p>ScaleDux is built for those who believe investing isn’t just capital — it’s timing, trust, and context. And here, you’ll find all three — streamlined, signal-rich, and founder-first.</p>

    <h3>Here’s what to expect next:</h3>
    <ul>
      <li>Early access to our curated startup discovery engine</li>
      <li>First look at our investor dashboards and filters</li>
      <li>A private Slack group for early enablers and signal-rich conversations</li>
      <li>Pre-launch walkthroughs and exclusive product demos</li>
      <li>Priority access and lifetime fee benefits for early backers</li>
    </ul>

    <p>ScaleDux is more than a platform — it’s a trust layer between builders ready to grow and investors who care about more than hype.</p>

    <p>Every ecosystem has an origin story. When we tell ours, your early trust will be remembered as one of the sparks that made it real.</p>

    <h3>Let’s get you started:</h3>
    <ul>
      <li><a href="[Slack Link]">Join our private Slack</a></li>
      <li><a href="[Blog Link]">Read investor insights on our blog</a></li>
      <li><a href="[Perks Link]">Unlock early-access benefits</a></li>
    </ul>

    <p>Thanks again for stepping in with belief. We’ll keep this worth your time.</p>

  @elseif ($role === 'mentor')

    <p>I’m Sunil — founder of ScaleDux. Thank you for joining as a mentor with purpose.</p>

    <p>We see mentorship as a deep relationship — not just advice or time slots. Your lived experience helps founders avoid mistakes, make better decisions, and move forward confidently.</p>

    <p>Whether guiding a go-to-market plan, reviewing hiring calls, or steadying a founder through tough weeks — your presence can change trajectories.</p>

    <p>You’re joining us early, and that matters more than you know.</p>

    <h3>Here’s what’s coming your way:</h3>
    <ul>
      <li>Early access to our mentorship tools and onboarding</li>
      <li>A private Slack group for mentors and early-stage founders</li>
      <li>Real feedback from founders you’ll support</li>
      <li>Priority access to shape the first mentor-founder matches</li>
      <li>A spotlight as one of ScaleDux’s founding enablers</li>
    </ul>

    <p>We’re building ScaleDux to be the most trusted space for founder growth — and that only works because of mentors like you. Your insights will be heard, appreciated, and acted on.</p>

    <p>When we tell the story of ScaleDux’s creation, your early belief will be remembered as a key reason real founders found their way.</p>

    <h3>Let’s get you started:</h3>
    <ul>
      <li><a href="[Slack Link]">Join our private Slack</a></li>
      <li><a href="[Blog Link]">Read our latest mentorship piece</a></li>
      <li><a href="[Perks Link]">Unlock your early-access perks</a></li>
    </ul>

    <p>Thank you for trusting us early. Together, we’re starting strong.</p>

  @endif

  <p>With gratitude,<br>
  Sunil Kumar Dash<br>
  Founder, ScaleDux<br>
  <a href="https://www.scaledux.com">www.scaledux.com</a></p>

  <div class="footer">
    <p>
      ScaleDux Software Innovations Pvt Ltd<br>
      A registered company under the Companies Act, 2013<br>
      Bengaluru, Karnataka – 560001, India<br>
      CIN: U62013OD2025PTC049049<br>
      📞 +91 9606626500 | 🌐 <a href="https://www.scaledux.com">www.scaledux.com</a> | 📧 <a href="mailto:contact@scaledux.com">contact@scaledux.com</a>
    </p>

    <p>
      You’re receiving this email because you joined the ScaleDux waitlist or interacted with one of our startup tools or resources.<br>
      <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> |
      <a href="{{ url('/terms-of-services') }}">Terms of Service</a> |
      <a href="{{ url('/unsubscribe') }}">Unsubscribe</a>
    </p>

    <p>© 2025 ScaleDux</p>
  </div>

</body>
</html>
