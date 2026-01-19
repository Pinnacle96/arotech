<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $service = htmlspecialchars(trim($_POST['service'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Validate (basic)
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: contact.php?status=error&msg=Missing%20required%20fields");
        exit;
    }

    // Prepare Body with Professional Template
    $logoUrl = 'https://arotech.com/assets/images/logo.png'; // Update with actual live URL when available
    $currentYear = date('Y');
    
    $bodyContent = "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; }
            .header { background-color: #002147; padding: 20px; text-align: center; }
            .header h1 { color: #ffffff; margin: 0; font-size: 24px; }
            .content { padding: 30px; background-color: #ffffff; }
            .field { margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px; }
            .field-label { font-weight: bold; color: #002147; font-size: 14px; text-transform: uppercase; }
            .field-value { margin-top: 5px; font-size: 16px; }
            .footer { background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #666; border-top: 1px solid #e0e0e0; }
            .footer p { margin: 5px 0; }
            .highlight { color: #F28C28; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>AROTECH <span style='color: #F28C28;'>POWER LIMITED</span></h1>
            </div>
            <div class='content'>
                <h2 style='color: #002147; margin-top: 0;'>New Service Inquiry</h2>
                <p>You have received a new message via the website contact form.</p>
                
                <div class='field'>
                    <div class='field-label'>Client Name</div>
                    <div class='field-value'>$name</div>
                </div>
                
                <div class='field'>
                    <div class='field-label'>Email Address</div>
                    <div class='field-value'><a href='mailto:$email'>$email</a></div>
                </div>
                
                <div class='field'>
                    <div class='field-label'>Phone Number</div>
                    <div class='field-value'>$phone</div>
                </div>
                
                <div class='field'>
                    <div class='field-label'>Service Interest</div>
                    <div class='field-value highlight'>$service</div>
                </div>
                
                <div class='field'>
                    <div class='field-label'>Message Details</div>
                    <div class='field-value'>" . nl2br($message) . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>&copy; $currentYear AROTECH POWER LIMITED. All rights reserved.</p>
                <p>No 5 Moses Somefun Street, Adekoya Estate, College Road, Ogba, Lagos.</p>
                <p><a href='https://arotech.com.ng' style='color: #002147; text-decoration: none;'>www.arotech.com</a></p>
            </div>
        </div>
    </body>
    </html>";

    $altBody = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\nMessage:\n$message";

    // Load configuration
    $config = require 'config.php';

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Debugoutput = function($str, $level) {
            file_put_contents(__DIR__ . '/smtp_debug.log', date('Y-m-d H:i:s') . ": $str\n", FILE_APPEND);
        };

        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $config['smtp']['host'];                // Set the SMTP server to send through
        $mail->SMTPAuth   = $config['smtp']['auth'];                // Enable SMTP authentication
        $mail->Username   = $config['smtp']['username'];            // SMTP username
        $mail->Password   = $config['smtp']['password'];            // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = $config['smtp']['port'];                // TCP port to connect to

        // Recipients
        $mail->setFrom($config['smtp']['from_email'], $config['smtp']['from_name']);
        $mail->addAddress('helpdesk.arotech@gmail.com');            // Add a recipient
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Inquiry from $name - $service";
        $mail->Body    = $bodyContent;
        $mail->AltBody = $altBody;

        $mail->send();
        
        // Also log to file for backup
        $logEntry = "--- New Submission (Sent via SMTP) [" . date('Y-m-d H:i:s') . "] ---\n" . $altBody . "\n-----------------------------------\n\n";
        file_put_contents(__DIR__ . '/contact_submissions.txt', $logEntry, FILE_APPEND);

        header("Location: contact.php?status=success");
        exit;
    } catch (Exception $e) {
        // Log the error
        $errorMsg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $logEntry = "--- FAILED SUBMISSION [" . date('Y-m-d H:i:s') . "] ---\n" . $altBody . "\nError: $errorMsg\n-----------------------------------\n\n";
        file_put_contents(__DIR__ . '/contact_submissions.txt', $logEntry, FILE_APPEND);

        header("Location: contact.php?status=error&msg=" . urlencode("System error, please try again later."));
        exit;
    }
} else {
    header("Location: contact.php");
    exit;
}
