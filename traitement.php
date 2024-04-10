<?php
    $host = 'localhost';
    $port = 3306;
    $dbname = 'informations';
    $user = 'root';
    $pwd = '';

    try {
      $newBD=new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user,$pwd);
      echo "Connexion etablie";
    } catch (PDOException $e){
      die ('Erreur :' .$e->getMessage());
    }

    if (isset($_POST['nom'])&&
        isset($_POST['prenom'])&&
        isset($_POST['email'])&&
        isset($_POST['motdepasse'])) {
                    $insersion=$newBD->prepare('INSERT INTO information VALUES(NULL,
                    :nom,:prenom,:email,:motdepasse)');
                    $insersion->bindValue(':nom',$_POST['nom']);
                    $insersion->bindValue(':prenom',$_POST['prenom']);
                    $insersion->bindValue(':email',$_POST['email']);
                    $insersion->bindValue(':motdepasse',$_POST['motdepasse']);
                    $verfication=$insersion->execute();
                    if ($verfication) {
                      echo "<br>Insertion reussie";
                    }else {
                      echo "Echec d'insertion";
                    }

        }else {
          echo "Une variable n'est pas declaree et ou est null";

        }
?>