<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation projectx</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form">
        <form action="form.php" method="POST">
            <label>Prenom <input type="text" name="prenom"></label><br><br>
            <label>Nom <input type="text" name="nom"></label><br><br>
            <label>Pseudo <input type="text" name="pseudo"></label><br><br>
            <label>Points <input value="0" name="number"></label><br><br>
            <label>email <input type="email" name="email"></label><br><br>
            <label>role <select name="role">
                    <option value="professeur">professeur</option>
                    <option value="eleve">élève</option>
                    <option value="un truc">un truc</option>
                </select></label><br><br>
            <label>date anniversaire <input type="date" name="date_anniversaire"></label><br><br>

           <label for=""> immunité </label><br>
            <div class="immunite"> <input type="radio" name="immunite" value="oui">oui   
               <input type="radio" name="immunite" value="non" checked>non</div>
               
            <input type="submit" value="Envoyer la sauce" name="envoyer">
        </form>
        <h2>Ajout de points</h2>
    <?php
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=ProjetX;port=3308',
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*Sélectionne toutes les valeurs dans la table users*/
        $sth = $pdo->prepare("SELECT * FROM users");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <table border=1>
            <?php
            foreach ($resultat as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['pseudo']?>
                    </td>
                    <td>
                        <form action="updatepoint.php" method="post">
                            <input type="hidden" name="user_id" value=<?php echo $value['id']?>>
                            <input type="number" name="number" value="<?php echo $value['point']?>">
                            <input type="submit" value="Appliquer">
                        </form>
                    </td>
                    <td>
                    </td>
                </tr>
            <?php 
            }
            ?>
        </table>
    <?php
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>


    </div>
    
</body>

</html>