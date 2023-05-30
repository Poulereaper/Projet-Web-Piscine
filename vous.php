<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />



    <title>Mon Espace ECE In</title>
    <?php
        // Identifier le nom de base de données
        $database = "projet-web-piscine";

        // Connexion à la base de donnée
        // à adapter en fonction de votre ordinateur

        // Création de la connexion à la base de donnée

        // WAMP sur Windows avec MySQL
        $db_handle = mysqli_connect('localhost', 'root', '', $database);
        // WAMP sur Windows avec MariaDB
        // $db_handle = mysqli_connect('db', 'root', '', $database, 3307);
        // Mac OS
        // $db_handle = mysqli_connect('localhost', 'root', 'root', $database, 8889);

        $db_found = mysqli_select_db($db_handle, $database);
    ?>
</head>
<body>
    <div id="header">
        <h1>ECE In: Social Media Professionnel de l'ECE Paris</h1>
    </div>
        <nav class="navigation">
            <a href ="#" class="logo_ECE_In"><img src="images/logo_ECE.png" alt="logo_ECE_In" width="75" height="75"></a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="inputbox">
                <ion-icon name="search-outline"></ion-icon>
                <input type="text" placeholder="Rechercher" size="22">
            </div>
            <div class="menu">
                <ul class="list">
                    <li><a href="accueil.php">Accueil</a></li>
                    <li><a href="reseau.php">Mon réseau</a></li>
                    <li><a href="vous.php">Vous</a></li>
                    <li><a href="notifications.php">Notifications</a></li>
                    <li><a href="messagerie.php">Messagerie</a></li>
                    <li><a href="emplois.php">Emplois</a></li>
                </ul>
            </div>
        </nav>
    <div id="Gray_bar"></div>
    <div id="Info_Right">
        <h2>Mes amis</h2>
        <div class="line-1"></div>
    </div>
    <div id="MonProfil">
        <br><br>
         <?php
            //si le BDD existe, faire le traitement
            if ($db_found) {
                $sql = "SELECT * FROM utilisateur where IDutilisateur = 1"; //test pour avoir un seul utilisateur
                $result = mysqli_query($db_handle, $sql);
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Nom:" . $data['Nom'] . "<br>";
                    echo "Prénom: " . $data['Prenom'] . "<br>";
                    echo "Adresse: " . $data['Adresse'] . "<br>";
                    echo "Date de naissance: " . $data['DateNaissance'] . "<br>";
                    $image = $data['PhotoProfil'];
                     echo "<div class='photo'><img src='$image' height='80' width='100'>" . "<br><br></div>";
                }//end while
            }//end if
            //si le BDD n'existe pas
            else {
                echo "Database not found";
            }//end else
        ?>
    <button type="submit" >Charger mon CV</button>
    </div>

    <div id="Formation">
        <h2>Formations</h2>
    </div>
    <div id="Projet">
        <h2>Projets</h2>
    </div>

    <div id="footer">
    <p>Nous contacter : </p>
            <p>Mail: <a href="mailto:laureline.grassin@edu.ece.fr">laureline.grassin@edu.ece.fr</a></p>
            <p>Tel: 01 44 39 06 00 </p>
            <P>Adresse: 10, Rue Sextius Michel</p>
            <p></br></br>Droit d'auteur | Copyright © 2023</p>
        <div id="googleMaps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3662947158255!2d2.2859909764319983!3d48.851225171331286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20-%20Ecole%20d&#39;ing%C3%A9nieurs%20-%20Engineering%20school.!5e0!3m2!1sfr!2sfr!4v1685365414049!5m2!1sfr!2sfr" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </div>
</body>
</html>