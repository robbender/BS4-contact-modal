<?php
$myemail = 'example@email.com';
if (isset($_POST['name'])) {
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$message = strip_tags($_POST['message']);
$link_address = "index.html";

$success = "<div class=\"alert alert-success\" ><strong>Your message is on the way!</strong><br>
Thank you for getting in touch! We appreciate you contacting us $name. One of our colleagues will get back in touch with you soon!<br /><br />
Here is what you submitted:</div><br>";

$failure = "<div class=\"alert alert-danger\" ><strong>Please fillout the required fields.</strong><br>
You may also call us at: 555-867-5309. If we are unavailable one of our colleagues will get back in touch with you soon! <br><br>\r\n
Here is what you submitted:</div><br>";

$noName = "<strong><i>No name provided.</i></strong>";
$noEmail = "<strong><i>No email provided.</i></strong>";
$noMessage = "<strong><i>No message provided.</i></strong>";

//Check if field is empty

if (empty($name)) {
  $name = $noName;
};

if (empty($email)) {
  $email = $noEmail;
};

if (empty($message)) {
  $message = $noMessage;
};

$info = "<div class=\"alert alert-secondary\" ><stong>Name:</strong> $name <br>
              <stong>Email:</strong> $email <br>
              <stong>Message:</strong> $message<br>
              <br />
          </div>";
// echo "<a  class=\"btn btn-primary\" href='".$link_address."'>Back</a>";

// Response to form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($name===$noName || $email===$noEmail || $message===$noMessage) {
    echo $failure, $info;
  } else {
    echo $success, $info;
  }
}

// Receiving Email Message Format

$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email";
mail($to,$email_subject,$email_body,$headers);
}?>
