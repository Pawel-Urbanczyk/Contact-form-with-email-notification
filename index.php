<?php
session_start();

if(!$_SESSION["a"]){
    $a = rand(1,50);
    $b = rand(1,50);
    $_SESSION["a"] = $a;
    $_SESSION["b"] = $b;
}

$email = '';
$message = '';
$name ='';
$result ='';
$error ='';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $check = intval($_POST['secCheck']);

        if(!$_POST['name']){$error .= 'Please enter your Name ! <br>';}
        if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){$error .= 'Please enter your Email ! <br>';}
        if(!$_POST['message']){$error .= 'Please enter your Message ! <br>';}
        if($check !==($_SESSION['a']+$_SESSION['b'])){$error .= 'Wrong value ! <br>';}



    if($error == ''){
        $from = '';
        $to =   ''; // email that you want to receive the email to. YOUR ADDRESS
        $subject = 'Message from contact form';
        $body = "From: $name ($email) \n Message \n $message";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <'.$from.'>' . "\r\n";
        if(mail($to,$subject,$body,$headers)){
            $result = '<div class="alert alert-success">Mail Sent</div>';
        }else{
            $result = '<div class="alert alert-danger">Mail wasn\'t sent</div>';
        }
        $email = '';
        $message = '';
        $name ='';

        // Send email
    } else {
        $result = '<div class="alert alert-danger">Error Found:<br>'.$error.'</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Contact Forn</title>
		<meta charset="utf-8" />
		<meta name="description" content="Contact Form"/>
		<meta name="keywords" content="Contact Form"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
		
	<!--Bootstrap links start-->
	
		<!--jQuery-->
		<script	src="js/jquery.js"></script>
		
		<!--Latest compiled and minified CSS-->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!--custom css-->
		<link rel="stylesheet" href="css/style.css">
		<!--font awesome-->
		<link rel="stylesheet" href="css/font-awesome.css">

		<!--Latest compiled and minified JavaScript-->
		<script src="js/bootstrap.js"></script>
		

	<!--Bootstrap links end-->
		
		
	</head>
    <body>
    <div class="container">
        <div class="row">
            <form method="post" action="index.php" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control" value="<?php echo $name;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" name="email" placeholder="your@email.com" class="form-control" value="<?php echo $email;?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                        <textarea id="message" name="message" rows="4" class="form-control"><?php echo $message;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="secCheck" class="col-sm-2 control-label">
                        <?php echo $_SESSION["a"]  . ' + ' .$_SESSION["b"] ; ?>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" id="secCheck" name="secCheck" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" value="Send" class="btn btn-primary btn-large btn-block" id="submit" name="submit">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <?php echo $result; ?>
                    </div>
                </div>
            </form>
        </div>

    </div>


    </body>

</html>