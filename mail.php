<?php
$to = "yuparmar1306@gmail.com";
$subject = "Testing PHP Email";
$message = "This is a test email sent using PHP.";
$headers = "From: yugparmartheactor@gmail.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "CC: cc@example.com\r\n";
$headers .= "BCC: bcc@example.com\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>