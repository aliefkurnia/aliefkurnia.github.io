<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Check for empty fields
    if (empty($name) || empty($email) || empty($phone) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = array("status" => "error", "message" => "Please fill in all fields correctly.");
    } else {
        // Send email
        $to = 'aliefkw26@gmail.com';
        $subject = "Website Contact Form: $name";
        $email_body = "You have received a new message from your website contact form.\n\n" .
                      "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email";

        if (mail($to, $subject, $email_body, $headers)) {
            $response = array("status" => "success", "message" => "Your message has been sent successfully.");
        } else {
            $response = array("status" => "error", "message" => "Sorry, there was an error sending your message. Please try again later.");
        }
    }
    echo json_encode($response);
} else {
    // Not a POST request
    echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
