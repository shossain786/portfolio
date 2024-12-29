<?php
include('includes/header.php');

$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = 'All fields are required. Please fill out the form completely.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // Email Configuration
        $to = 'yourname@example.com';
        $subject = 'New Contact Message from Portfolio';
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";

        // Send email
        if (mail($to, $subject, $body)) {
            $success = 'Thank you for your message! I will get back to you soon.';
        } else {
            $error = 'Sorry, there was an error sending your message. Please try again later.';
        }
    }
}
?>

<link rel="stylesheet" href="css/contact.css">

    <div class="container">
        <div class="contact-section">
            <h2>Get in Touch</h2>
            <div class="contact-content">
                <!-- Left Side: Text -->
                <div class="contact-text">
                    <p>
                        Are you looking for a seasoned SDET Engineer with over a decade of experience in test automation, API
                        testing, and CI/CD integration? 
                    </p>
                    <p>
                        Let's collaborate to build robust and efficient automation solutions tailored to your needs.
                        Feel free to reach out for consultations, project discussions, or partnership opportunities.
                    </p>

                    <div class="contact-details">
                        <a href="mailto:saddam.jobs.career@gmail.com">
                            <i class="fas fa-envelope"></i>
                            <strong>Email:</strong>
                            <span style="color: blue;">saddam.jobs.career@gmail.com</span>
                        </a>
                        <br>
                        <a href="tel:+917030400093">
                            <i class="fas fa-phone-alt"></i>
                            <strong>Phone:</strong> +091 703 040 0093
                        </a>
                    </div>
                </div>

                <!-- Right Side: Form -->
                <div class="contact-form">
                    <h3>Send Me a Message</h3>
                    <?php if ($error): ?>
                        <div class="feedback error"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="feedback success"><?= $success ?></div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Your Name"
                            value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                        <input type="email" name="email" placeholder="Your Email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                        <textarea name="message" placeholder="Your Message" rows="5"
                            required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
include('includes/footer.php');
?>