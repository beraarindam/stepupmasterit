<!DOCTYPE html>
<html>

<head>
    <title>New Enquiry</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 5px;">
        <h2 style="background: #1b305c; color: #fff; padding: 15px; margin-top: 0; text-align: center;">New Website
            Enquiry</h2>

        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Phone:</strong> {{ $contact->phone ?? 'N/A' }}</p>

        @if($contact->subject)
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
        @endif

        <h3 style="border-bottom: 2px solid #eee; padding-bottom: 5px; margin-top: 30px;">Message Detail:</h3>
        <div style="background: #f9f9f9; padding: 15px; border-left: 4px solid #ff9600;">
            {!! nl2br(e($contact->message)) !!}
        </div>

        <p style="margin-top: 30px; font-size: 13px; color: #888;">This email was sent from your website's contact form.
        </p>
    </div>
</body>

</html>