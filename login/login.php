<?php
include "../src/service/serviceBDD.php";
$bdd = new serviceBDD("localhost", 3306, "bddqcm", "root", "");
$mysqlConnection = $bdd->getStatement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connexion</title>
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
<div class="p-10 min-h-screen flex justify-center bg-gradient-to-r from-pink-600 to-purple-600">
<div class="w-full max-w-xs mx-auto mt-10 sm:max-w-sm md:max-w-md">
    <form action='../login/login.php' method='post' class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-gray-900 text-3xl font-bold text-center mb-6">Connexion</h1>
        <div class="mb-2">
            <label class="block text-gray-700 text-sm uppercase tracking-wide font-bold mb-1">
                Login
            </label>
            <input type="text" placeholder="Entrez votre login..." name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:border-purple-600" id="username">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm uppercase tracking-wide font-bold mb-1">
                Mot de passe
            </label>
            <input type="password" placeholder="Entrez votre mot de passe..." name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:border-purple-600" id="password">
        </div>
        <div class="flex items-center justify-between">
            <input type="submit" value='Connexion' class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <a href="/login/inscription.php" class="inline-block align-baseline font-bold text-sm text-purple-500 hover:text-purple-700">Inscription</a>
        </div>
        </input>
        <?php

        if (isset($_POST['username']) && $_POST['password']) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $requeteConnexion = "SELECT login FROM bddqcm.etudiants WHERE login = :username and motDePasse = :password";
            $requete = $mysqlConnection->prepare($requeteConnexion);
            $requete->bindParam('username', $username, PDO::PARAM_STR);
            $requete->bindParam('password', $password, PDO::PARAM_STR);
            $requete->execute();

            if (!empty($requete)) {
                $nbRow = $requete->rowCount();
                if ($nbRow > 0) {
                    session_start();
                    $_SESSION['login'] = $username;
                    $result = $requete->fetchAll(PDO::FETCH_ASSOC);
                    echo "Bienvenue " . $result[0]["login"] . " sur Quizizz";
                } else {
                    echo "Utilisateur ou mot de passe incorrect";
                }
            }
        }
        if(isset($_SESSION['login']))
        {
            header('Location: /index.php');
            exit();
        }
        ?>
        </form>
</div>
</div>
</body>

