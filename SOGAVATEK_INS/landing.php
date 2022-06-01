<link rel="stylesheet" type="text/css" href="login/style.css">
<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
	  <style>
				.form-wrapper{
					height:470px;
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
		  input[type='file']{
						background: transparent url("login/img/user.jpg") no-repeat;
						background-position: 10px 50%;
					 }
			.form-wrapper img{
				width: 100px;
				height: 100px;
				margin-top: -90px;
				margin-left: 100px;
				 }
				.form-wrapper1 {
width:300px;
height:370px;
  position: relative;
  top: 20%;
 /* 
	margin: -184px 0px 0px -155px;*/
  background: rgba(0,0,0,0.27);
  padding: 15px 25px;
  border-radius: 5px;
  box-shadow: 0px 1px 0px rgba(0,0,0,0.6),inset 0px 1px 0px rgba(255,255,255,0.04);
			</style>
	  
        <div class="contenair">
            <div class="col-md-12">
                <?php 
                        if(isset($_GET['err'])){
                            $err = htmlspecialchars($_GET['err']);
                            switch($err){
                                case 'current_password':
                                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                                break;

                                case 'success_password':
                                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                                break; 
                            }
                        }
                    ?>


                <div class="text-center">
                        <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
                        <hr />
                        <a href="deconnexion.php" class="btn btn-danger btn-lg" >Déconnexion</a>
					 </div>
				</div>
			</div>
	  
	   <!-- changement de mot de passe -->
					<div class="form-wrapper">
                       
						<div class="button-panel">
                    <input type="submit" class="button" name="inscription" value="Changer mon mot de passe" data-toggle="modal" data-target="#change_password"></input>
                </div>
                        
                                

                     
                                <form action="layouts/change_password.php" method="POST">
									<div class="form-item">
                                    <label for='current_password'>Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
										</div>
									
                                    <br />
									<div class="form-item">
                                    <label for='new_password'>Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
										</div>
                                    <br />
										<div class="form-item">
                                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
											<br />
                                
                                    <div class="button-panel">
                    <input type="submit" class="button" name="changemotdepasse" value="Modifier" ></input>
                </div>
                                </form>
                            </div>
                                           
                   </div>
		  

                        <div class="form-wrapper1">  
                            <div class="button-panel">
                    <input type="submit" class="button" name="avatar" value="Changer mon Avatar" data-toggle="modal" data-target="#avatar"></input>
                </div>
                        
                        <div class="modal-body">  
                            <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                                <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
								<div class="button-panel">
                                <input type="file" name="avatar_file">
									</div>
                                
								 <div class="button-panel">
                   				 <input type="submit" class="button" name="btn btn-success" value="Changer" ></input>
                				</div>
                                
                            </form>
                        </div>                                   
                </div>
            </div>
		  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
