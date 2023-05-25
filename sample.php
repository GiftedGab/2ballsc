<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate form data (you can add more validation as per your requirements)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields";
        exit;
    }

    // Set recipient email address
    $recipientEmail = "gifted.inspirations@yahoo.com";

    // Set email subject
    $subject = "New message from website contact form";

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Compose the email body
    $emailBody = "<h3>You have received a new message from the website contact form:</h3>";
    $emailBody .= "<p><strong>Name:</strong> $name</p>";
    $emailBody .= "<p><strong>Email:</strong> $email</p>";
    $emailBody .= "<p><strong>Message:</strong><br>$message</p>";

    // Send the email
    if (mail($recipientEmail, $subject, $emailBody, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message. Please try again.";
    }
}
?>
