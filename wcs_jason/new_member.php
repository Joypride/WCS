<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link href="style.css" rel="stylesheet">

        <!-- Title -->
        <title>Les Argonautes</title>
    </head>

    <body>
    <?php
        if(isset($_POST["name"])) 
        {
            $name = $_POST["name"];

            // Connexion à la BDD
            $db = new PDO('mysql:host=localhost;dbname=argonautes', 'root', '') ;
            $db->query("SET NAMES 'utf8' ");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête préparée
            $r = $db->prepare( "INSERT INTO member (name) VALUES(:name)");
            $r->bindParam(':name', $name);
            $r->execute();
        }  
    ?>
        <p class="welcome" style='text-align: center';>Bienvenue dans l'équipage !</p><br>
        <div style="text-align: center;">
            <a href="index.php">Retour à la liste des membres</a>
        </div>
    </body>
</html>