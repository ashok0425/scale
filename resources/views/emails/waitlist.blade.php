<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ScaleDux Waitlist Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border: 1px solid #e0e0e0;">
    @if ($user_role=='founder')
           <!-- Founder/Aspiring Founder Email -->
    <tr id="founder-email">
      <td style="padding: 30px;">

        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Hey {{$firstName}},</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’m Sunil — the founder of ScaleDux. Seeing your name on our early waitlist? Honestly, it means a lot. Thank you for believing in something that's still taking shape 😊.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">This is more than a sign-up. It's a sign of intent — the kind only a true builder has. And now, you're officially part of a community that gets what that means.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">You’ve joined us at a raw and real moment — where every click, every early sign-up, and every bit of faith helps lay the first bricks of a new kind of business platform. We’re not building "yet another startup tool." We’re crafting a space where founders like you can find trusted talent, raise capital without the chaos, and grow with mentorship that actually moves the needle.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Your presence here isn’t just a number. It’s a signal — that you're building with clarity, courage, and conviction. And we see that.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Here’s what you can look forward to:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px;">
          <li>Behind-the-scenes peeks at how ScaleDux is evolving</li>
          <li>Tools and guides made only for founders</li>
          <li>A personal invite to our early-user Discord space</li>
          <li>Stories from other builders who are in the same messy, exciting phase as you</li>
          <li>Priority access to perks, beta features, and pilot collaborations</li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">ScaleDux is not just another platform — it’s a growing community of real builders, dreamers, and founders like you. People who believe in building with honesty, clarity, and purpose. And we’re truly happy to have you with us. You belong here.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">When people ask how ScaleDux started, we’ll talk about the first 100 founders who showed up early and built with us. Your name will be right there — as one of them.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Let’s get you started:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px; list-style: none;">
          <li><a href="https://discord.gg/q2k9BtXx8N" style="color: #007bff; text-decoration: none;">Join our private Discord</a></li>
          <li><a href="https://www.scaledux.com/blogs" style="color: #007bff; text-decoration: none;">Read our latest founder blog</a></li>
          <li><a href="{{url('priority-access')}}" style="color: #007bff; text-decoration: none;">Unlock your early-access perks</a></li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Thank you once again for being early. You didn’t just show up — you stood up.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">We’ll build this together — with clarity, care, and crazy passion.</p>
        <p style="font-size: 14px; color: #666666; margin: 0 0 20px;">Confidential | © 2025 ScaleDux</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’ll be back in your inbox soon — with something special just for early insiders like you. Until then, keep building.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0;">Warmly,<br>Sunil Kumar Dash<br>Founder, ScaleDux<br><a href="mailto:sdash@scaledux.com" style="color: #007bff; text-decoration: none;">sdash@scaledux.com</a><br><a href="https://www.scaledux.com" style="color: #007bff; text-decoration: none;">www.scaledux.com</a></p>
      </td>
    </tr>
    @endif

     @if ($user_role=='freelance')
    <!-- Freelancer/Agency Email -->
    <tr id="freelancer-email" >
      <td style="padding: 30px;">
        <h1 style="font-size: 24px; color: #333333; margin: 0 0 20px;">Thank You for Joining the ScaleDux Waitlist — Let’s Build with Purpose</h1>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Hey {{$firstName}},</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’m Sunil — founder of ScaleDux. Just wanted to say a big thank you for showing up early. Truly grateful to have you with us 😊.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">It means a lot to know that talented freelancers and agencies like you are ready to be part of something meaningful — a platform where your work gets the respect it deserves.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">You’re joining a platform where your time, skill, and craft are truly valued. A space built for meaningful collaboration — where verified founders and growing businesses come looking for long-term partners, not just short-term help.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">And because you’re here early, you’ll get a head start.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Here’s what’s coming your way:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px;">
          <li>Sneak peeks into how ScaleDux is evolving</li>
          <li>Ready-to-use pitch decks, templates, and playbooks</li>
          <li>Invite to our early freelancer Discord group</li>
          <li>Early visibility when the platform goes live</li>
          <li>First dibs on 0% commission perks and premium access</li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">At ScaleDux, we do things the right way — with trust, transparency, and respect. Every project here comes from a verified team that values your expertise, honours your time, and wants to build something real with you.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">No noise. No shortcuts. Just honest work, trusted teams, and real growth — the way it should be.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Years from now, when ScaleDux is powering thousands of businesses, we’ll remember the first 100 creators who believed before the world noticed. Your name will be etched in that story.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Let’s get you started:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px; list-style: none;">
          <li><a href="https://discord.gg/q2k9BtXx8N" style="color: #007bff; text-decoration: none;">Join our private Discord</a></li>
          <li><a href="https://www.scaledux.com/blogs" style="color: #007bff; text-decoration: none;">Read our latest blog post</a></li>
          <li><a href="{{url('priority-access')}}" style="color: #007bff; text-decoration: none;">Unlock your early-access perks</a></li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Thanks again for trusting us this early. We’re building this together — and we’re so glad you’re with us.</p>
        <p style="font-size: 14px; color: #666666; margin: 0 0 20px;">Confidential | © 2025 ScaleDux</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’ll be back in your inbox soon — with something special just for early insiders like you. Until then, keep building.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0;">Warmly,<br>Sunil<br>Founder, ScaleDux<br><a href="mailto:sdash@scaledux.com" style="color: #007bff; text-decoration: none;">sdash@scaledux.com</a><br><a href="https://www.scaledux.com" style="color: #007bff; text-decoration: none;">www.scaledux.com</a></p>
      </td>
    </tr>
    @endif

     @if ($user_role=='investor')
    <!-- Investor Email -->
    <tr id="investor-email" >
      <td style="padding: 30px;">
        <h1 style="font-size: 24px; color: #333333; margin: 0 0 20px;">Thank You for Joining the ScaleDux Waitlist — Let’s Build with Purpose</h1>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Hey {{$firstName}},</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’m Sunil — founder of ScaleDux. Delighted to welcome you to our early circle. Thank you 😊 for showing faith in what we’re building — your presence at this stage is a powerful signal that we’re moving in the right direction.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">You’re stepping into ScaleDux — a curated marketplace ecosystem built for clarity, trust, and meaningful connections. A space where aligned founders and thoughtful investors meet — without inbox noise, scattered pitches, or time lost on decks that don’t match your thesis.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">ScaleDux is being built for those who believe investing isn’t just about capital — it’s about timing, trust, and meaningful context. And here, you’ll find all three — streamlined, signal-rich, and founder-first.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Here’s what to expect next:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px;">
          <li>Early access to our curated startup discovery engine</li>
          <li>First look at our investor dashboards and filters</li>
          <li>A private Discord group for early enablers and signal-rich conversations</li>
          <li>Pre-launch walkthroughs and exclusive product demos</li>
          <li>Priority Access and lifetime fee benefits for early backers</li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">ScaleDux is more than a platform. It’s a trust layer — between builders who are ready, and investors who care about more than hype.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Every ecosystem has its origin story. And when we share how ScaleDux came to life — your early trust will be remembered as one of the sparks that made it real.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Let’s get you started:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px; list-style: none;">
          <li><a href="https://discord.gg/q2k9BtXx8N" style="color: #007bff; text-decoration: none;">Join our private Discord</a></li>
          <li><a href="https://www.scaledux.com/blogs" style="color: #007bff; text-decoration: none;">Read investor insights on our blog</a></li>
          <li><a href="{{url('priority-access')}}" style="color: #007bff; text-decoration: none;">Unlock early-access benefits</a></li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Thanks again for stepping in with belief. We’ll keep this worth your time.</p>
        <p style="font-size: 14px; color: #666666; margin: 0 0 20px;">Confidential | © 2025 ScaleDux</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’ll be back in your inbox soon — with something special just for early insiders like you. Until then, keep building.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0;">With respect,<br>Sunil<br>Founder, ScaleDux<br><a href="mailto:sdash@scaledux.com" style="color: #007bff; text-decoration: none;">sdash@scaledux.com</a><br><a href="https://www.scaledux.com" style="color: #007bff; text-decoration: none;">www.scaledux.com</a></p>
      </td>
    </tr>
    @endif
     @if ($user_role=='mentor')
    <!-- Mentor Email -->
    <tr id="mentor-email" >
      <td style="padding: 30px;">
        <h1 style="font-size: 24px; color: #333333; margin: 0 0 20px;">Thank You for Joining the ScaleDux Waitlist — Let’s Build with Purpose</h1>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Hey {{$firstName}},</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’m Sunil — founder of ScaleDux. Thank you 😊 for joining our waitlist, and for showing intent to mentor with purpose.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">At ScaleDux, we don’t see mentorship as just advice or time slots. We see it as something deeper — a relationship where your lived experience helps a founder avoid mistakes, make better decisions, and move forward with confidence.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Whether it’s guiding a go-to-market plan, reviewing a hiring call, or just helping a founder stay steady during hard weeks — your presence can change someone’s trajectory.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">And you’re joining us early. That matters more than you know.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Here’s what’s coming your way:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px;">
          <li>Early access to our mentorship tools and onboarding</li>
          <li>A private Discord group for mentors and early-stage founders</li>
          <li>Real feedback from founders you’ll support</li>
          <li>Priority Access to shape the first mentor-founder matches</li>
          <li>A spotlight as one of ScaleDux’s founding enablers</li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">We’re building ScaleDux to be the most trusted space for founder growth — and that only works because of mentors like you. Here, your insights won’t get lost in noise. They’ll be heard, appreciated, and acted on.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">When we tell the story of how ScaleDux was built, your early belief and guidance will be remembered as one of the reasons real founders found their way.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Let’s get you started:</p>
        <ul style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px; padding-left: 20px; list-style: none;">
          <li><a href="https://discord.gg/q2k9BtXx8N" style="color: #007bff; text-decoration: none;">Join our private Discord</a></li>
          <li><a href="https://www.scaledux.com/blogs" style="color: #007bff; text-decoration: none;">Read our latest piece on mentorship with impact</a></li>
          <li><a href="{{url('priority-access')}}" style="color: #007bff; text-decoration: none;">Unlock your early-access perks</a></li>
        </ul>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">Truly grateful to be building this with you. Let’s make this mentorship journey count.</p>
        <p style="font-size: 14px; color: #666666; margin: 0 0 20px;">Confidential | © 2025 ScaleDux</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0 0 20px;">I’ll be back in your inbox soon — with something special just for early insiders like you. Until then, keep building.</p>
        <p style="font-size: 16px; color: #333333; line-height: 1.6; margin: 0;">Warmly,<br>Sunil<br>Founder, ScaleDux<br><a href="mailto:sdash@scaledux.com" style="color: #007bff; text-decoration: none;">sdash@scaledux.com</a><br><a href="https://www.scaledux.com" style="color: #007bff; text-decoration: none;">www.scaledux.com</a></p>
      </td>
    </tr>
    @endif
    <!-- Footer -->
    <tr>
      <td style="padding: 20px 30px; background-color: #f8f8f8; text-align: center; font-size: 14px; color: #666666; line-height: 1.6;">
        <p style="margin: 0 0 10px;">ScaleDux Software Innovations Pvt Ltd<br>A registered company under the Companies Act, 2013<br>Bengaluru, Karnataka – 560001, India<br>CIN: U62013OD2025PTC049049</p>
        <p style="margin: 0 0 10px;">📞 +91 9606626500 | 🌐 <a href="https://www.scaledux.com" style="color: #007bff; text-decoration: none;">www.scaledux.com</a> | ✉️ <a href="mailto:contact@scaledux.com" style="color: #007bff; text-decoration: none;">contact@scaledux.com</a></p>
        <p style="margin: 0 0 10px;">You’re receiving this email because you joined the ScaleDux waitlist or interacted with one of our startup tools or resources.</p>
        <p style="margin: 0;">
          <a href="{{url('privacy-policy')}}" style="color: #007bff; text-decoration: none;">Privacy Policy</a> |
          <a href="{{url('terms-of-services')}}" style="color: #007bff; text-decoration: none;">Terms of Service</a> |
          <a href="{{url('unsubscribe')}}" style="color: #007bff; text-decoration: none;">Unsubscribe</a>
        </p>
        <p style="margin: 10px 0 0;">Confidential | © 2025 ScaleDux</p>
      </td>
    </tr>
  </table>

</body>
</html>
