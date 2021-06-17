<?php
// Set variables to nil
// $name = $email = $message = "";
$required_text = " (Required)";
$mailTo = "s3912792@student.rmit.edu.au";
$subject = 'Inquiry from GitHub'; //email subject line

if (isset($_POST['submit'])) {

    if (empty($_POST["nameInput"])) {
        $nameErr = "Please enter a name.";
    } else {
        $name = test_input($_POST['nameInput']);
        // check for allopwed characters
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white spaces are allowed";
        }
    }

    if (empty($_POST["emailInput"])) {
        $emailErr = "Please enter an email address.";
    } else {
        $email = test_input($_POST['emailInput']);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["messageInput"])) {
        $message = "";
    } else {
        $message = test_input($_POST["messageInput"]);
    }

    // send it when required fields are filled
    if (empty($nameErr) && empty($emailErr)) {
        $headers = "From: " . $email;
        $txt = "You have received an email from " . $name . ".\n\n" . $message;
        $mailSent = mail($mailTo, $subject, $txt, $headers);
    }
}

// Function to remove special characters, remove whitespace and any backslashes from input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
