<?php
session_start();
    if(!$_SESSION['a']){
        $a = rand(1,50);
        $b = rand(1,50);
        $_SESSION['a'] = $a;
        $_SESSION['b'] = $b;
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
                <form action="index.php" method="POST" class="">
                    <div class="form-group">
                        <!--Name Start-->
                            <label for="name" class="col-sm-2 control-label">Name: </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" placeholder="Insert your Name !" class="form-control">
                                <p class="text-danger">You need to enter a Name Value</p>
                            </div>
                        <!--Name End-->

                        <!--Email Start-->
                            <label for="email" class="col-sm-2 control-label">Email: </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" placeholder="Insert your Email !" class="form-control">
                                <p class="text-danger">You need to enter a Email Value</p>
                            </div>
                        <!--Email End-->

                        <!--Message Start-->
                        <label for="message" class="col-sm-2 control-label">Message: </label>
                        <div class="col-sm-10">
                            <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                            <p class="text-danger">You need to enter a Message</p>
                        </div>
                        <!--Message End-->

                        <!--Antispam/Captcha Start-->
                        <label for="secCheck" class="col-sm-2 control-label"><?php echo  $_SESSION['a'] .' + '.  $_SESSION['b'];?> ?</label>
                        <div class="col-sm-10">
                            <input type="text" name="secCheck" id="secCheck" class="form-control">
                            <p class="text-danger">Answer that question !</p>
                        </div>
                        <!--Antispam/Captcha End-->

                        <!--Submit Start-->
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="submit" value="Send" class="btn btn-primary btn-large btn-block" id="submit" name="submit">
                            </div>
                        </div>
                        <!--Submit End-->
                    </div>
                </form>
            </div>
        </div>

        <script>

        </script>
	</body>
</html>