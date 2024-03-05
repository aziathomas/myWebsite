<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Sanitize and validate input
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, "Message", FILTER_SANITIZE_STRING);
  
    // Check if required fields are not empty
    if (!empty($name) && !empty($message)) {
      
      // Construct email content
      $email_subject = "New Message from $name";
      $email_body = "Name: $name\n\nMessage:\n$message\n";
  
      // Set additional email headers
      $headers = "From: webmaster@example.com"; // Replace with your email or leave empty for default
  
      // Send email
      $mail_result = mail("thomasaz@kean.edu", $email_subject, $email_body, $headers);
  
      if ($mail_result) {
        echo "Email sent successfully!";
      } else {
        echo "Failed to send email. Please try again later.";
      }
  
    } else {
      echo "Name and Message are required fields.";
    }
  
  } else {
    echo "Invalid request method.";
  }