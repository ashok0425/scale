<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Resource Download – ScaleDux</title>
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
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #7400e8;
        }
        p {
            line-height: 1.6;
            font-size: 16px;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
            margin: 15px 0;
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
        .footer a {
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thanks for Grabbing Your Free Resource 🎉</h1>

        <p>Hi {{$name}},</p>

        <p>
            Thanks for requesting one of our free resources — and welcome to a growing circle of builders
            who believe in doing things differently. 🚀
        </p>

        <p>
            This isn’t just a download. It’s your signal to the world that you're serious about growth, clarity,
            and doing the work with purpose.
        </p>

        <h2>Your resource is ready:</h2>
        <p>
            👉
            <a href="{{$link}}" target="_blank" rel="noopener noreferrer">
                Click here to download your file
            </a>
            <br />
            <small>(This link stays active for 24 hours — download it soon!)</small>
        </p>

        <h3>What else is waiting for you?</h3>
        <p>
            We’re building ScaleDux to support you at every step — with clarity, speed, and trust:
        </p>
        <ul>
            <li>
                <a href="https://www.scaledux.com/blog" target="_blank" rel="noopener noreferrer">
                    Read our founder-first blogs
                </a>
            </li>
            <li>
                Follow us on social for sneak peeks, early features & founder stories:
                <br />
                <a href="{{cms()->linkedin}}" target="_blank" rel="noopener noreferrer">LinkedIn</a> |
                <a href="{{cms()->facebook}}" target="_blank" rel="noopener noreferrer">Facebook</a> |
                <a href="{{cms()->instagram}}" target="_blank" rel="noopener noreferrer">Instagram</a> |
                <a href="{{cms()->twitter}}" target="_blank" rel="noopener noreferrer">Twitter</a>
            </li>
        </ul>

        <p>
            If this resource gave you even 1% more clarity — stick around. There’s a lot more coming your way. 💜
        </p>

        <p>
            Thanks for being here. You’re not just downloading a file — you’re joining a movement built
            on trust, purpose, and momentum.
        </p>

        <p>
            With gratitude,
            <br />
            <strong>Sunil Kumar Dash</strong><br />
            Founder, ScaleDux<br />
            <a href="https://www.scaledux.com" target="_blank" rel="noopener noreferrer">
                www.scaledux.com
            </a>
        </p>

        <div class="footer">
            <p>
                ScaleDux Software Innovations Pvt Ltd<br />
                A registered company under the Companies Act, 2013<br />
                Bengaluru, Karnataka – 560001, India<br />
                CIN: U62013OD2025PTC049049<br />
                📞 +91 9606626500 | 🌐
                <a href="https://www.scaledux.com" target="_blank" rel="noopener noreferrer">www.scaledux.com</a> |
                ✉ <a href="mailto:contact@scaledux.com">contact@scaledux.com</a>
            </p>
            <p>
                You’re receiving this email because you joined the ScaleDux waitlist or interacted
                with one of our startup tools or resources.<br />
                <a href="{{ url('privacy-policy') }}">Privacy Policy</a> |
                <a href="{{ url('terms-of-services') }}">Terms of Service</a> |
                        <a href="{{route('unsubscribe',['uuid'=>$uuid])}}">Unsubscribe</a>

            </p>
        </div>
    </div>
</body>
</html>
