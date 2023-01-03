<?php
session_start();
include "../src/service/serviceBDD.php";
$bdd = new serviceBDD("localhost", 3306, "bddqcm", "root", "");
$mysqlConnection = $bdd->getStatement();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Inscription</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<nav class="text-gray-700 bg-white"
     style="font-family: 'Source Sans Pro', sans-serif">
    <div
            class="container mx-auto px-6 py-2 flex justify-between items-center"
    >
        <a href="/" class="font-bold text-2xl lg:text-4xl">
            Quizizz
        </a>
        <div class="md:block">
            <?php
            if (isset($_SESSION['login'] ))
            {
                echo'<a href="/questionnaire.php" class="inline-block p-2 text-pink-600 hover:text-pink-500">Questionnaire</a>
            <a href="/login/deconnexion.php" class="inline-block p-2 text-pink-600 hover:text-pink-500">Deconnexion</a>';
            }
            else
            {
                echo'<a class="inline-block p-2 text-gray-600 hover:text-gray-500">Questionnaire</a>
            <a href="/login/login.php" class="inline-block p-2 text-pink-600 hover:text-pink-500">Connexion</a>
            <a href="/login/inscription.php" class="inline-block p-2 text-white bg-purple-600 hover:bg-purple-300 hover:text-purple-800 rounded transition ease-in duration-150">Inscription</a>';
            }
            ?>
        </div>
    </div>
    </div>
</nav>
<body>
<form action="inscription.php" method="post">
<div class="p-10 min-h-screen flex justify-center bg-gradient-to-r from-pink-600 to-purple-600">

  <div class="bg-white p-16 rounded shadow-2xl w-2/3">

    <h2 class="text-3xl font-bold mb-10 text-gray-800">Inscription</h2>

    <form class="space-y-5">

      <div>
        <label class="block mb-1 font-bold text-gray-500">Login</label>
        <input placeholder="Entrez un login..." name="username" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
      </div>
      
      <div>
        <label class="block mb-1 font-bold text-gray-500">Nom</label>
        <input placeholder="Entrez votre nom..." name="lastname" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
      </div>
      
      <div>
        <label class="block mb-1 font-bold text-gray-500">Prenom</label>
        <input placeholder="Entrez votre prenom..." name="firstname" type="text" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
      </div>

      <div>
        <label class="block mb-1 font-bold text-gray-500">Email</label>
        <input placeholder="Entrez un email..." name="email" type="email" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
      </div>

      <div>
        <label class="block mb-1 font-bold text-gray-500" >Password</label>
        <input placeholder="Entrez un mot de passe..." name="password" type="password" class="w-full border-2 border-gray-200 p-3 rounded outline-none focus:border-purple-500">
      </div>
        <form action="/index.php" method="post">
            <div class="flex items-center justify-between">
            <input type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" value="S'inscrire" />
            <a href="/login/login.php" class="inline-block align-baseline font-bold text-sm text-purple-500 hover:text-purple-700">Retour</a>
            </div>

  <?php
        if (isset($_POST['username']) && $_POST['lastname'] && $_POST['firstname'] && $_POST['email'] && $_POST['password']) {
            $username = $_POST['username'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO bddqcm.etudiants(etudiants.login,etudiants.motDePasse,etudiants.nom,etudiants.prenom,etudiants.email)
            VALUE('$username','$password','$lastname','$firstname','$email')";
            $requete = $mysqlConnection->prepare($query);
            try {
                $requete->execute();
            } catch (PDOException $error) {
                echo "Erreur" . $error->getMessage();
            }
            echo "<div class='font-bold text-2xl lg:text-4xl'>Inscription terminée</div>";
        }
        ?>
        </form>

    </form>

  </div>
</form>
</div>
</body>