<html lang = "en">
<head> 
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		 <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
		<link rel="stylesheet" href="css/login.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
<title>PUP FACILITY RESERVATION</title>


</head>
<style>
	body {
        background-color: #444;
        background-image: url("img/picture.jpg");
        
    }
</style>
<body>
		
		<div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img  src="img/logo.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                           
                                <?php session_start(); session_destroy(); ?>
						            <form action ="user.php" method="post">
						            
						              
						                <input required autofocus type="text" class="form-control" name="user" placeholder="Username"><br>
						                <input type="password" id="inputPassword" class="form-control" name="pwd" placeholder="Password" required> <br> 
						                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="btnLogin">Sign in</button>
						            
						            </form><!-- /form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

	
</body>
</html>