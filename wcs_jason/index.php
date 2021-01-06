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
        <!-- Header section -->
        <header>
            <h1>
                <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
                Les Argonautes
            </h1>
        </header>

        <!-- Main section -->
        <main>
            <!-- New member form -->
            <h2>Ajouter un(e) Argonaute</h2>
            <form action="new_member.php" method="post" class="new-member-form">
                <label for="name">Nom de l&apos;Argonaute</label>
                <input id="name" name="name" type="text" placeholder="Charalampos" />
                <button type="submit">Envoyer</button>
            </form>
            
            <!-- Member list -->
            <h2>Membres de l'équipage</h2>
            <section class="member-list">
                <?php
                    $db = new PDO('mysql:host=localhost;dbname=argonautes', 'root', '') ;
                    $db->query("SET NAMES 'utf8'");
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $r = $db->query('SELECT * FROM member');
                    $new = $r->fetchAll(PDO::FETCH_OBJ) ;

                    foreach ($new as $n) 
                    {
                    ?>
                        <div class='member-item'><?= htmlspecialchars($n->name, ENT_QUOTES) ?></div>
                    <?php
                    }
                ?>
            </section>
        </main>
        <footer>
            <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
        </footer>
    </body>
</html>