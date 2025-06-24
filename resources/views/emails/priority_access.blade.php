<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Priority Access Confirmation – ScaleDux</title>
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
    h1 { color: #7400e8; }
    p { font-size: 16px; line-height: 1.6; }
    ul { list-style-type: disc; padding-left: 20px; }
    a { color: #7400e8; text-decoration: none; }
    a:hover { text-decoration: underline; }
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
  <h1>Welcome to Priority Access, {{ $firstName }}!</h1>

  {{-- Founder Email --}}
  @if ($user_role === 'founder')
    <p>I’m Sunil — founder of ScaleDux and from the core of my heart, thank you 🙏.</p>
    <p>You’ve joined as one of our earliest Priority Access members, and that means something big.</p>
    <p>You didn’t just reserve a spot — you raised your hand and said, “I’m in.”</p>
    <p>This email isn’t just a confirmation. It’s a commitment — from us to you.</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 projects</li>
      <li>Founder spotlight placement</li>
      <li>Smart filters & AI-powered matching</li>
      <li>Private beta access</li>
      <li>The Founder Playbook & startup templates</li>
    </ul>

    <p>
      👉 <a href="[founder-benefits-link]">Download your complete Priority Access Benefits guide</a>
    </p>

    <h3>What’s Next:</h3>
    <ul>
      <li><a href="https://discord.gg/q2k9BtXx8N">Join the Inner Circle (Discord)</a></li>
      <li><a href="https://www.scaledux.com/blog">Explore our blog</a> – filled with real, founder-first stories</li>
      <li>Follow us on:
        <a href="{{ cms()->linkedin }}">LinkedIn</a>,
        <a href="{{ cms()->facebook }}">Facebook</a>,
        <a href="{{ cms()->instagram }}">Instagram</a>,
        <a href="{{ cms()->twitter }}">Twitter</a>
      </li>
    </ul>

    <p>Know another founder who should be here? Forward this email or <a href="#">share your invite link</a>.</p>
    <p>Thanks again for backing us this early. You’re not just on a list — you’re at the table where the real building begins.</p>
    <p>Let’s create something that actually solves problems, earns pride, and moves people — together.</p>

  {{-- Freelancer/Agency --}}
  @elseif ($user_role === 'freelancer' || $user_role === 'agency')
    <p>I’m Sunil — founder of ScaleDux. And from me to you — thank you 🙏</p>
    <p>You just joined as one of our earliest service providers through Priority Access, and that means a lot more than a spot on a list.</p>
    <p>This isn’t just about inbox pings. It’s about fixing what’s broken in how great freelancers get noticed, paid, and respected.</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 projects</li>
      <li>Early visibility to verified founders</li>
      <li>Smart project matching</li>
      <li>Private beta access</li>
      <li>Top placement in our Freelancer Showcase Directory</li>
    </ul>

    <p>
      👉 <a href="[freelancer-benefits-link]">Download your full Priority Access Benefits guide</a>
    </p>

    <h3>What’s Next:</h3>
    <ul>
      <li><a href="https://discord.gg/q2k9BtXx8N">Join the Inner Circle (Discord)</a></li>
      <li><a href="https://www.scaledux.com/blog">Explore our blog</a> – get real client strategies</li>
      <li>Follow us on:
        <a href="{{ cms()->linkedin }}">LinkedIn</a>,
        <a href="{{ cms()->facebook }}">Facebook</a>,
        <a href="{{ cms()->instagram }}">Instagram</a>,
        <a href="{{ cms()->twitter }}">Twitter</a>
      </li>
    </ul>

    <p>Know another freelancer or agency you trust? Forward this email or share your invite. Great people build better platforms.</p>
    <p>Thanks again — you’re not just here to work. You’re helping us build something better from the inside.</p>

  {{-- Investor --}}
  @elseif ($user_role === 'investor')
    <p>I’m Sunil — founder of ScaleDux. Thank you for joining early via Priority Access 🙏</p>
    <p>You’ve signaled belief in a platform where founder-investor discovery is built on clarity, not noise.</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 engagements</li>
      <li>Lifetime 30% discount on investor subscriptions</li>
      <li>Verified, data-rich founder profiles</li>
      <li>Private beta access</li>
      <li>Access to our exclusive Investor Lens toolkit (coming soon)</li>
    </ul>

    <p>
      👉 <a href="[investor-benefits-link]">Download your complete Benefits guide</a>
    </p>

    <h3>What’s Next:</h3>
    <ul>
      <li><a href="https://discord.gg/q2k9BtXx8N">Join our private investor Discord</a></li>
      <li><a href="https://www.scaledux.com/blog">Explore the blog</a> – insights on founder fit & signal-based discovery</li>
      <li>Follow us on:
        <a href="{{ cms()->linkedin }}">LinkedIn</a>,
        <a href="{{ cms()->facebook }}">Facebook</a>,
        <a href="{{ cms()->instagram }}">Instagram</a>,
        <a href="{{ cms()->twitter }}">Twitter</a>
      </li>
    </ul>

    <p>Know an investor who shares this mindset? Forward this email or share your invite link.</p>
    <p>Thank you again for trusting us this early. You’re not just browsing founders — you’re helping shape what real discovery should feel like.</p>

  {{-- Mentor --}}
  @elseif ($user_role === 'mentor')
    <p>I’m Sunil — founder of ScaleDux. And thank you for stepping in as a mentor 🙏</p>
    <p>You believe mentorship is a relationship — not just a meeting. And that’s exactly the spirit behind what we’re building.</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 mentorship sessions</li>
      <li>Spotlight in our verified mentor showcase</li>
      <li>Smart filters by founder stage, goals & needs</li>
      <li>Private beta access</li>
      <li>Early tools to manage and scale your mentoring impact</li>
    </ul>

    <p>
      👉 <a href="[mentor-benefits-link]">Download your full Benefits guide</a>
    </p>

    <h3>What’s Next:</h3>
    <ul>
      <li><a href="https://discord.gg/q2k9BtXx8N">Join our private mentor group on Discord</a></li>
      <li><a href="https://www.scaledux.com/blog">Explore the blog</a> – real founder challenges & mentorship moments</li>
      <li>Follow us on:
        <a href="{{ cms()->linkedin }}">LinkedIn</a>,
        <a href="{{ cms()->facebook }}">Facebook</a>,
        <a href="{{ cms()->instagram }}">Instagram</a>,
        <a href="{{ cms()->twitter }}">Twitter</a>
      </li>
    </ul>

    <p>Know a mentor or advisor with clarity and heart? Invite them in. This circle grows best with people like you.</p>
    <p>You’re helping us build mentorship with dignity and real impact — thank you.</p>
  @endif

  <p>With gratitude,<br />
    <strong>Sunil Kumar Dash</strong><br />
    Founder, ScaleDux<br />
    <a href="https://www.scaledux.com">www.scaledux.com</a>
  </p>

  <div class="footer">
    <p>
      ScaleDux Software Innovations Pvt Ltd<br />
      Registered under Companies Act, 2013<br />
      Bengaluru, Karnataka – 560001, India<br />
      CIN: U62013OD2025PTC049049<br />
      📞 +91 9606626500 | 🌐 <a href="https://www.scaledux.com">scaledux.com</a> | ✉
      <a href="mailto:contact@scaledux.com">contact@scaledux.com</a>
    </p>
    <p>
      You’re receiving this email because you joined the ScaleDux waitlist, Priority Access, or used one of our startup tools.<br />
      <a href="{{ url('privacy-policy') }}">Privacy Policy</a> |
      <a href="{{ url('terms-of-services') }}">Terms of Service</a> |
      <a href="{{url('unsubscribe')}}">Unsubscribe</a>
    </p>
  </div>
</div>
</body>
</html>
