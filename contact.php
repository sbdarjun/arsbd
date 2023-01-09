<?php

// Get the form data
$name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING));

// Check that all required fields are filled out
if ($name == "" || $email == "" || $message == "") {
  echo "Please fill out all required fields.";
  exit;
}

// Set the recipient email address
$recipient = "sbdarjun12@gmail.com";

// Set the email subject
$subject = "New contact form submission from $name";

// Build the email content
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message:\n$message\n";

// Build the email headers
$email_headers = "From: $name <$email>";

// Send the email
if (mail($recipient, $subject, $email_content, $email_headers)) {
  // Set a success message
  $success = "Your message was sent successfully!";
} else {
  // Set an error message
  $error = "There was a problem sending your message.";
}

?>
