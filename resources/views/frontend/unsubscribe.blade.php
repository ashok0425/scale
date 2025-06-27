<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscribe Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .feedback-card {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .feedback-card h3 {
            font-weight: bold;
        }
        .btn-purple {
            background-color: #6f42c1;
            color: white;
        }
        .btn-purple:hover {
            background-color: #5a32a3;
        }
        .footer-note {
            font-style: italic;
            font-size: 0.9rem;
            margin-top: 20px;
        }
        .company-footer {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 30px;
            text-align: center;
        }
        .company-footer a {
            color: #6c757d;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="feedback-card text-center">
    <h3>Leaving us <span>😢</span>?</h3>
    <p class="fs-5 fw-semibold">We’d love your quick feedback</p>
    <p>We’re sorry to see you go — but we completely understand.<br>If you don’t mind, could you tell us why?<br>It helps us improve and send only what truly matters.</p>

    <form method="POST">
        @csrf
        <input type="hidden" value="{{request()->uuid}}" name="uuid">
        <div class="text-start">
            <div class="form-check">
                <input class="form-check-input" required type="radio" name="reason" id="reason1" value="I'm getting too many emails">
                <label class="form-check-label" for="reason1" >I'm getting too many emails</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" required type="radio" name="reason" id="reason2" value="The content isn’t relevant to me">
                <label class="form-check-label" for="reason2">The content isn’t relevant to me</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" required type="radio" name="reason" id="reason3" value="I didn’t subscribe knowingly">
                <label class="form-check-label" for="reason3">I didn’t subscribe knowingly</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" required checked type="radio" name="reason" id="reason4" value="I prefer to follow on social media">
                <label class="form-check-label" for="reason4">I prefer to follow on social media</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" required type="radio" name="reason" id="reason5" value="Other">
                <label class="form-check-label" for="reason5">Other:</label>
            </div>
            <textarea class="form-control mb-3" rows="2" name="other_reason" placeholder="Write your reason here..."></textarea>
        </div>

        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-purple">Submit Feedback & Unsubscribe</button>
            <button type="submit" class="btn btn-light border">Just Unsubscribe</button>
        </div>
    </form>

    <p class="footer-note mt-4">
        Whether this is goodbye or just a pause — thank you for being part of our early journey.<br>
        We’re still cheering for your success. Always 💛
    </p>

    <div class="company-footer mt-3">
        <div>ScaleDux Software Innovations Pvt Ltd</div>
        <div>Plot No 241/2601, First Floor, Jaydev Vihar, Bhubaneswar, Odisha — 751013, India</div>
        <div>CIN: UXXXX00000XXX</div>
        <div>📞 +91 9000000000 | 📧 hello@scaledux.com</div>
        <div><a href="https://www.scaledux.com">www.scaledux.com</a></div>
        <div>
              @foreach (App\Models\Page::limit(3)->get() as $page)
                   <span>|</span>
          <span><a href="{{route('page',['slug'=>$page->slug])}}" class="hover:text-gray-300">{{Str::title($page->name)}}</a></span>
           @endforeach
        </div>
    </div>
</div>

</body>
</html>
