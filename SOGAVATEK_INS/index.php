<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="sogavatek"/>
			<link rel="stylesheet" type="text/css" href="login/style.css">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Connexion</title>
        </head>
        <body>
        <style>
				
				input[type='password']{
					background: transparent url("login/img/pass.jpg") no-repeat;
					background-position: 10px 50%;
				}
				input[type='email']{
						background: transparent url("login/img/user.jpg") no-repeat;
						background-position: 10px 50%;
					 }
				input[type='text']{
						background: transparent url("login/img/user.jpg") no-repeat;
						background-position: 10px 50%;
					 }
			.form-wrapper img{
				width: 100px;
				height: 100px;
				margin-top: -90px;
				margin-left: 80px;
					}
			</style>
        <div class="form-wrapper">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
             <img src="login/img/login.png"/>
			
            <form action="connexion.php" method="post">
				
                <h3 class="text-center">Connexion</h3>       
                <div class="form-item">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-item">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="button-panel">
					<input type="submit" class="button" title="Log In" name="login" value="Connexion"></input>
    			</div> 
            </form>
            
			<div class="reminder">
    <p>Not a member? <a href="inscription.php">Inscription</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
  
</div>
  
  	
       
        </body>
</html>