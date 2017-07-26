<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'Demo Contact Form';
    $to = 'example@domain.com';
    $subject = 'Message from Contact Demo ';
    $body ="From: $name\n E-Mail: $email\n Message:\n $message";
}
// Check if name has been entered
if (!isset($_POST) || !key_exists('name', $_POST)) {
    $errName = 'Please enter your name';
}
// Check if email has been entered and is valid
if (!isset($_POST) || !key_exists('email', $_POST) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errEmail = 'Please enter a valid email address';
}
//Check if message has been entered
if (!isset($_POST) || !key_exists('message', $_POST)) {
    $errMessage = 'Please enter your message';
}
//Check if simple anti-bot test is correct
if (!isset($human) || $human !== 5) {
    $errHuman = 'Your anti-spam is incorrect';
}
// If there are no errors, send the email
if (!isset($errName) && !isset($errEmail) && !isset($errMessage) && !isset($errHuman)) {
    $result = fakemail($to, $subject, $body, $from);
    if (isset($result)) {
        $result .= '<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result .= '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
    }
}
/**
 * if you want to send real mail, substitute mail for fakemail
 * with the same parameters.
 *
 * @param $to
 * @param $subject
 * @param $body
 * @param $from
 * @return string faking mail output.
 */
function fakemail($to, $subject, $body, $from) {
    $result = "<br/>Sending email to $to from $from with subject $subject and body <p>$body</p>";
    return $result;
}
function showPost($name) {
    if (isset($_POST[$name])) {
        echo htmlspecialchars($_POST[$name]);
    }
}
?>

