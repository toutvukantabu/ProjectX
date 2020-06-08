
       <?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetx;port=3308','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $user_id= $_POST['user_id'];
              $point= $_POST['number'];



              //On prépare la requête et on l'exécute
               $sth = $pdo->prepare("
                 UPDATE users
                 SET point= $point
                 WHERE id= $user_id
               ");
               $sth->execute();
              
              header("location:administration.php");
           }
                
           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }
       ?>
