<?php
session_start();
include "src/service/serviceBDD.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Acceuil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body
    class="text-gray-700 bg-white"
    style="font-family: 'Source Sans Pro', sans-serif"
  >
<nav>
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

    <div
      class="p-10 min-h-screen flex justify-center bg-gradient-to-r from-pink-600 to-purple-600"
    >
      <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold mb-2 text-white">
          Bienvenue sur Quizizz!
        </h2>
        <div class="md:w-1/2 ">
 <img src="https://www.notredamevalenciennes.fr/s/cc_images/teaserbox_2479015708.png?t=1585236164" alt="Quizizz" class="w-full rounded shadow-2xl">
</div>
</body>';