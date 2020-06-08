<?php

// echo $prenom;
// echo $nom;
// echo $pseudo;
// echo $immunite;
// echo $point;
// echo $email;
// echo $role;
// echo $date_anniversaire;
try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetx;port=3308','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $immunite = $_POST['immunite'];
    $point = $_POST['number'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $date_anniversaire = $_POST['date_anniversaire'];
 
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO users(nom,prenom,pseudo,email,point,role,immunite,date_anniversaire)
        VALUES (:nom, :prenom, :pseudo, :email, :number, :role, :immunite,:date_anniversaire)
    ");
    $sth->execute(array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':pseudo' => $pseudo,
                        ':email' => $email,
                        ':number' => $point,
                        ':role' => $role,
                        ':immunite' => $immunite,
                        ':date_anniversaire' => $date_anniversaire ));
    echo "Entrée ajoutée dans la table";
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}


?>