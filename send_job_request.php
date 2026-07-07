<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "surecoolengineering@gmail.com";
    
    $name = htmlspecialchars($_POST['name']);
    $job_title = htmlspecialchars($_POST['job_title']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $subject = "New Service Request: " . $job_title . " - From " . $name;
    
    $htmlContent = "
    <html>
    <head>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f1f5f9; padding: 20px; color: #333; }
            .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
            .header { background: #0F172A; padding: 30px; text-align: center; border-bottom: 4px solid #14B8A6; }
            .header h2 { color: #14B8A6; margin: 0; text-transform: uppercase; letter-spacing: 1px; }
            .header p { color: #94A3B8; margin: 5px 0 0 0; font-size: 14px; }
            .content { padding: 40px; }
            .job-badge { display: inline-block; background: #F97316; color: #ffffff; padding: 10px 25px; border-radius: 30px; font-weight: bold; margin-bottom: 30px; font-size: 15px; }
            .details-table { width: 100%; border-collapse: collapse; }
            .details-table td { padding: 15px; border-bottom: 1px solid #e2e8f0; font-size: 15px; }
            .details-table td:first-child { font-weight: 600; color: #0F172A; width: 35%; text-transform: uppercase; font-size: 13px; }
            .message-box { background: #F8FAFC; padding: 20px; border-left: 4px solid #14B8A6; margin-top: 20px; border-radius: 0 8px 8px 0; }
            .footer { background: #0F172A; color: #64748B; text-align: center; padding: 20px; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Sure Cool Air Engineering</h2>
                <p>New Service / Job Request Received</p>
            </div>
            <div class='content'>
                <div class='job-badge'>Requested Service: $job_title</div>
                <table class='details-table'>
                    <tr><td>Customer Name</td><td>$name</td></tr>
                    <tr><td>Contact Number</td><td>$contact</td></tr>
                    <tr><td>Email Address</td><td>$email</td></tr>
                </table>
                <div class='message-box'>
                    <strong style='display:block; margin-bottom:10px;'>Project Details:</strong>
                    $message
                </div>
            </div>
            <div class='footer'>
                &copy; 2024 Sure Cool Air Engineering And Trading (Pvt) Ltd.<br>
                317/A, Horana Road, Alubomulla, Panadura
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: SureCool Website <noreply@surecoolengineering.com>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    if(mail($to, $subject, $htmlContent, $headers)) {
        echo "<script>alert('Your request has been sent successfully! Our team will contact you soon.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try calling us directly.'); window.location.href='index.html';</script>";
    }
} else {
    echo "Invalid Request.";
}
?>