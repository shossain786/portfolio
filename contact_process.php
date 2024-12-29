<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Use PHP mail() function or integrate a mail service to send the message.
    // For example, using the mail() function to send an email:
    
    $to = "saddam.jobs.career@gmail.com";
    $subject = "Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "There was a problem sending the message.";
    }
}
?>
