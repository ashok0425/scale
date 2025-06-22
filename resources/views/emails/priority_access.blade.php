<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Priority Access Email Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      line-height: 1.5;
      margin: 0;
      padding: 0 20px;
    }
    h1, h2, h3, h4 {
      color: #7400e8;
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

    <p>I’m Sunil — founder of ScaleDux and from the core of my heart, thank you 🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼. You’ve joined as one of our earliest Priority Access members, and that means something big. By choosing Priority Access, you didn’t just reserve a spot — you raised your hand and said, “I’m in 💪🏻</p>

    <p>You saw potential before proof.<br>
    You backed purpose before polish.<br>
    That kind of early belief is rare — and powerful. 💜💜”</p>

    <p>You didn’t just believe in ScaleDux as a product. You believed in the problem we’re solving — the broken way founders connect, build, and grow. And in that belief, you became part of the solution.</p>

    <p>This email isn’t just a confirmation. It’s a COMMITMENT — from us to you. It’s our first real handshake. A quiet, powerful moment that says: “I’m here to build. I believe there’s a better way. And I want to be part of it — from Day One.”</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 projects</li>
      <li>Founder spotlight placement</li>
      <li>Smart filters & AI-powered matching</li>
      <li>Private beta access</li>
      <li>The Founder Playbook & ready-to-use startup templates</li>
    </ul>

    <p>You can download the complete Priority Access Benefits guide here— so you know exactly what’s coming, what’s yours, and what’s next.</p>

    <h3>What’s Next</h3>
    <ul>
      <li><strong>Join the Inner Circle (Slack):</strong> This is where early founders swap feedback, share raw ideas, ask questions, and shape what ScaleDux becomes. No fluff — just focused people building forward.</li>
      <li><strong>Explore our blog:</strong> We’re sharing insights that are practical, honest, and founder-first. No buzzwords. No recycled advice. Just the kind of stuff we wish we had when we started.</li>
      <li><strong>Follow us on social media:</strong> Stay in the loop as we drop sneak peeks, early features, and founder spotlights.</li>
      <li><strong>Know another founder who should be here?</strong> Forward them this email or <a href="#">share the invite link</a>. Great people build better ecosystems — and we’d love to meet those you trust.</li>
    </ul>

    <p>Thank you again for backing us this early. You’re not just on the waitlist — you’ve taken a seat at the table where the real building begins.</p>

    <p>Let’s create something that doesn’t just look good on paper — but actually moves people, solves problems, and earns pride. Something we’ll all look back on and say — we were part of that. Together 💜🙏🏼🔥.</p>

  @elseif ($role === 'freelancer')

    <p>I’m Sunil — founder of ScaleDux. And from me to you — thank you 🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼🙏🏼. You just joined as one of our earliest service providers through Priority Access, and that means a lot more than just a spot on a list.</p>

    <p>You didn’t wait for validation. You stepped in with belief — in us, in this vision, and in your own craft. That kind of early move speaks volumes about who you are as a professional.</p>

    <p>This isn’t just about getting early projects or inbox pings. It’s about building a better way — where skilled freelancers and agencies aren’t buried under fake leads, underpriced bids, or endless noise.</p>

    <p>You believed in a platform that respects your work. A space where quality gets noticed, trust is earned fast, and the right opportunities find you.</p>

    <p>This email? It’s not just a receipt. It’s our first real handshake. A quiet but solid moment that says:</p>

    <p>“I’m here to grow, to deliver value, and to be part of something that respects the way I work.”</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 projects</li>
      <li>Early visibility to verified founders</li>
      <li>Smart project matching</li>
      <li>Private beta access</li>
      <li>Top placement in our Freelancer Showcase Directory</li>
    </ul>

    <p>Grab your full benefits guide here - so you know exactly what’s coming your way.</p>

    <h3>What’s Next:</h3>
    <ul>
      <li><strong>Join our Slack group:</strong> Collaborate, ask questions, share wins, and grow with other verified freelancers and early founders.</li>
      <li><strong>Explore our blog:</strong> We’re publishing real playbooks to help you pitch better, manage clients smarter, and grow your freelance brand with confidence.</li>
      <li><strong>Refer a freelancer or agency you trust:</strong> This is your community too — and it grows better when great people bring great people.</li>
    </ul>

    <p>Thank you once again for trusting us this early. You’re not just here to work on ScaleDux — you’re one of the very first helping us shape what it becomes. Together, let’s build a platform that truly respects your time, values your craft, and honours the journey you’ve chosen.</p>

    <p>We’re genuinely proud to have you with us — right from the start 🙏🏼.</p>

  @elseif ($role === 'investor')

    <p>I’m Sunil — founder of ScaleDux. And I want to personally thank you for joining through Priority Access 🙏🏼</p>

    <p>By stepping in this early, you’ve done more than just sign up — You’ve sent a clear signal:</p>

    <p>That you believe founders deserve better ways to raise, connect, and grow — and that platforms should enable clarity, not noise.</p>

    <p>This email isn’t a formality. It’s your welcome note into a focused, trust-first network — where capital meets context, and credibility flows in both directions.</p>

    <p>You’ll be among the first to explore:</p>
    <ul>
      <li>Verified founder profiles</li>
      <li>Rich, filterable data on traction, clarity, and GTM signals</li>
      <li>Direct access to builders who are intentional, prepared, and ready for meaningful partnerships</li>
    </ul>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 engagements</li>
      <li>Lifetime 30% discount on all investor subscription plans</li>
      <li>Access to verified, data-rich founder profiles</li>
      <li>Beta access before the public release</li>
      <li>Priority invite to our exclusive “Investor Lens” toolkit (coming soon)</li>
    </ul>

    <p>Download your complete Priority Access Benefits guide here — everything you’ve unlocked, laid out clearly, so you know exactly what’s yours and what’s coming next.</p>

    <h3>What’s Coming Next:</h3>
    <ul>
      <li><strong>Join our private Slack group:</strong> This is where early investors, mentors, and enablers exchange ideas, spot early signals, and shape how discovery works on ScaleDux. It’s quiet, curated, and built for real conversations.</li>
      <li><strong>Explore the blog:</strong> We’re sharing early thinking — how we’re designing investor-founder fit, reducing pitch friction, and building signal-first profiles. No jargon. Just honest insights.</li>
      <li><strong>Refer a fellow investor:</strong> Know someone who shares this mindset? Forward this email or share your referral link. We’re growing this carefully — and high-signal people tend to know more of the same.</li>
    </ul>

    <p>Thank you again for believing in ScaleDux at this stage. This kind of early trust isn’t something we take lightly — it stays with us.</p>

    <p>You’re not just here to browse startups. You’re helping us design the very foundation that will support the next generation of builders — the ones who dare, dream, and do the hard things.</p>

    <p>And we’ll make sure that every step of this journey respects the belief you’ve shown. We’re truly honoured to build this with you.</p>

  @elseif ($role === 'mentor')

    <p>I’m Sunil — founder of ScaleDux. And from the bottom of my heart, thank you. You joined as a mentor — but more importantly, as someone who believes in doing it right.</p>

    <p>You’re backing a platform that sees mentorship not as a calendar slot, but as a relationship — one that walks with a founder through key decisions, tough calls, and defining moments.</p>

    <p>In a time where true guidance is rare and rushed advice is the norm — your early belief in ScaleDux stands out. It tells us you care about depth, intention, and making real impact where it counts.</p>

    <p>This isn’t just an onboarding email. It’s your invitation into a high-trust community — one that puts clarity, context, and care at the heart of how mentorship should work.</p>

    <p>This isn’t just an onboarding email. It’s your invitation into a movement & into a high-trust community, where mentorship is reimagined with care, built on trust, and driven by the kind of clarity founders truly need.</p>

    <h3>Here’s What You’ve Unlocked:</h3>
    <ul>
      <li>0% commission on your first 5 mentorship sessions</li>
      <li>Spotlight placement in our verified mentor showcase</li>
      <li>Smart filtering by founder stage, goals & needs</li>
      <li>Private beta access before the public roll-out</li>
      <li>Early tools to manage and scale your mentoring impact</li>
    </ul>

    <p>Download your complete Priority Access Benefits guide here — everything you've unlocked, all in one place.</p>

    <h3>What’s Next:</h3>
    <ul>
      <li><strong>Join our private Slack group:</strong> This is where early mentors, founders, and enablers connect — sharing insights, shaping features, and helping us build a better platform together.</li>
      <li><strong>Explore the blog:</strong> We’re sharing founder-first perspectives, mentorship lessons, and stories from those walking the walk.</li>
      <li><strong>Refer a fellow mentor or advisor:</strong> Know someone with heart, experience, and clarity? Invite them in — this circle grows best when it's built by people like you.</li>
    </ul>

    <p>Thank you again for trusting us this early. You’re not just joining a platform — you’re helping build one that treats mentorship with the dignity, depth, and intention it truly deserves. And because of that, we’re starting strong — together 💜🙏🏼🔥.</p>

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
      You’re receiving this email because you joined the ScaleDux waitlist or priority access or interacted with one of our startup tools or resources.<br>
      <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> |
      <a href="{{ url('/terms-of-services') }}">Terms of Service</a> |
      <a href="{{ url('/unsubscribe') }}">Unsubscribe</a>
    </p>

    <p>© 2025 ScaleDux</p>
  </div>

</body>
</html>
