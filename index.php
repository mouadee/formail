<?php
session_start();
require 'libs/phpmailer/PHPMailerAutoload.php';
require 'libs/phpmailer/class.phpmailer.php';
require 'libs/phpmailer/class.pop3.php';
require 'libs/phpmailer/class.smtp.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Asign Variables

  $name = @$_POST['name'];
  $email = @$_POST['email'];
  $message = @$_POST['message'];
  $button = @$_POST['button'];

  // Create Form Errors

    $formErrors= array();

    if (strlen($name) > 10) {
      $formErrors[] = '<div class="nameerr alert alert-warning alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      Name Must Be Less Than 10 Characters!
      </div>';
    }

    if (strlen($message) < 10) {
      $formErrors[] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      Message Can\'t Be Less Than 10 Characters!
      </div>';
    }

    $header = 'From :' . $email . '\r\n';
    $to = 'myemail@gmail.com';
    $subject = 'Contact Form';
    $from = 'From: yoursite.com';
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    // if (empty($formErrors)) {
    //   $risala = mail ($to, $subject, $body, $from;

      if (empty($formErrors)) {

        $m = new PHPMailer;
        //$m->isSMTP();
        $m->SMTPAuth = true;
        $m->Host = 'smtp.gmail.com';
        $m->Username = 'elazzaouimouade@gmail.com';
        $m->Password = 'entrerprise7260726012000';
        $m->SMTPSecure = 'tls';
        $m->Port = 465;
        $m->isHTML(true);

        $m->Subject = 'Here is the subject';
        $m->Body    = $message;
        $m->setFrom('Mouade');
        $m->addAddress('elazzaouimouade@gmail.com', 'elazzaoui');
        if(!$m->send()) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Message could not be sent !
          </div>';
          echo 'Mailer Error: ' . $m->ErrorInfo;
        } else {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Message has been sent !
          </div>';
        }

      }

    //}
}



 ?>
    <div class="form-group">
      <form class="" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="alert alert-success" role="alert">
          <h2>Send Message</h2>
        </div>
        <div class="errors">
          <?php
            if (isset($formErrors)) {
              foreach ($formErrors as $error) {
                echo $error;
              }
            }
           ?>
        </div>
        <label for="ex">Email address <span class="red">*</span></label>
        <input type="email" name="email" class="form-control email" id="ex" placeholder="Enter email"  value="<?php if (isset($email)) { echo $email; } ?>">
        <label for="nm">Name <span class="red">*</span></label> <br>
        <input type="text" name="name" class="form-control form-control-success name" id="nm" placeholder="Name"  value="<?php if (isset($name)) { echo $name; } ?>">
        <label for="ms">Message <span class="red">*</span></label>
        <textarea class="form-control msg" name="message" id="ms" rows="3" placeholder="Type Your Message" value="<?php if (isset($message)) { echo $message; } ?>"></textarea>
        <br><span class="red">*</span> <i>Required Fields</i><br>
        <button class="btn btn-success send" type="submit" name="button">Send</button>
      </form>
    </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>
