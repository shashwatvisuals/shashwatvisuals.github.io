<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your email where the form will send
    $to = "shashwatmishra466@gmail.com";

    // Collect form data safely
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Build email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message sending failed. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>