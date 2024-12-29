<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email Configuration
    $to = 'yourname@example.com';
    $subject = 'New Contact Message from Portfolio';
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo 'Message sent successfully!';
    } else {
        echo 'Failed to send the message.';
    }
} else {
    echo 'Invalid request.';
}
?>
