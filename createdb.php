<?php
// $pdo = new PDO('mysql:host=localhost;','root','');
$pdo = new PDO('mysql:host=localhost;port=3308','root','');
//  Si PDO n'arrive pas à faire le lien avec la base de données
$sql = "CREATE DATABASE IF NOT EXISTS `projetx` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=projetx;port=3308','root','');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE `projetx`.`users` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `nom` VARCHAR(50) NOT NULL , 
    `prenom` VARCHAR(50) NOT NULL , 
    `pseudo` VARCHAR(50) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `point` INT(100) NOT NULL , 
    `role` VARCHAR(100) NOT NULL , 
    `immunite` BOOLEAN NOT NULL , 
    `date_inscription` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `date_anniversaire` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations, la table a bien été créée !';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }



?>
