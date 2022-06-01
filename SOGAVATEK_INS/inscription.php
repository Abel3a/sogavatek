<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
			<link rel="stylesheet" type="text/css" href="login/style.css">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
			<style>
				.form-wrapper{
					height:450px;
				}
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
				margin-left: 100px;
					}
			</style>
        <div class="form-wrapper">
			<img src="login/img/inscription.png"/>
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h3 class="text-center">Inscription</h3>       
                <div class="form-item">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-item">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-item">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-item">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="button-panel">
                    <input type="submit" class="button" name="inscription" value="Inscription"></button>
                </div>   
            </form>
                               
				<div class="reminder">
    			<p> Déja membre <a href="index.php">login</a></p>
      			</div>
  
</div>
        </body>
</html>
