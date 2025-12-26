<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry Form Submission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .email-body {
            padding: 30px;
        }

        .info-row {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eeeeee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #8400c7;
            margin-bottom: 5px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #333;
            font-size: 16px;
            word-wrap: break-word;
        }

        .message-box {
            background: #f8f9ff;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #8400c7;
        }

        .email-footer {
            background: #f8f9ff;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>🎯 New Enquiry Lead Submission</h1>
            <p style="margin: 10px 0 0 0; font-size: 14px; opacity: 0.9;">BingeAt Media</p>
        </div>

        <div class="email-body">
            <p style="font-size: 16px; margin-bottom: 25px;">You have received a new enquiry lead submission with the
                following details:</p>

            <div class="info-row">
                <div class="info-label">Name</div>
                <div class="info-value">{{ $enquiry->name }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $enquiry->email }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Phone</div>
                <div class="info-value">{{ $enquiry->phone }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Message</div>
                <div class="message-box">
                    <div class="info-value">{{ $enquiry->message }}</div>
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">Service</div>
                <div class="info-value">{{ $enquiry->source_page ?? 'N/A' }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Submitted At</div>
                <div class="info-value">{{ $enquiry->created_at->format('d M Y, h:i A') }}</div>
            </div>
        </div>

        <div class="email-footer">
            <p style="margin: 0;">This email was sent from your BingeAt Media website enquiry form.</p>
            <p style="margin: 10px 0 0 0; color: #8400c7; font-weight: 600;">BingeAt Media</p>
        </div>
    </div>
</body>

</html>
