<?php
if(isset($_POST['submit'])) {

$myemail = "alexrkroeger@gmail.com"; 
$subject = $_POST['subject'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$headers = "From:Contact Form <$myemail>\r\n";
$headers .= "Reply-To: $name <$email>\r\n";

echo "Your message has been sent successfully!";
mail($myemail, $subject, $message, $headers);

} else {

echo "An error occurred during the submission of your message";

}
?>
