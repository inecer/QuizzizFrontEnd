<?php
session_start();
include "src/service/serviceBDD.php";
$bdd=new serviceBDD("localhost", 3306,"bddqcm","root","");
$mysqlConnection=$bdd->getStatement();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Questionnaire</title>
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
                echo'<a href="/login/deconnexion.php" class="inline-block p-2 text-pink-600 hover:text-pink-500">Deconnexion</a>';
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
<div class="p-10 min-h-screen flex justify-center bg-gradient-to-r from-pink-600 to-purple-600">
    <div class="mt-20 flex space-x-8">

</head>
<body>
<?php
echo "<div class='font-bold text-2xl lg:text-4xl text-white'>Bienvenue {$_SESSION['login']}, choisissez un questionnaire :</div>";
?>
<div>
    <?php
    $libQuestionnaire="SELECT questionnaire.libelleQuestionnaire FROM bddqcm.questionnaire";
    $requete=$mysqlConnection->prepare($libQuestionnaire);
    $requete->execute();
    $resultQuestionnaire=$requete->fetchAll();
    $id=1;
    /*foreach ($resultQuestionnaire as $keyResultQuestionnaire=>$row)
    {
        echo "<div class='space-y-4 flex justify-center' onclick={location.href='quiz/index.php?idQuestionnaire=$id'}>

                        <h2 class='text-center font-mono font-semibold  text-white h-20 w-20 rounded-lg shadow-xl transform hover:-translate-y-2 transition-transform duration-500 ease-in-out'>$row[0]</h2>
                      </div>";
        $id++;
    }
    */
    if ($id=1){
        echo' <div class="space-y-4"><h2 class="text-justify font-mono font-semibold  text-white">Cinéma</h2><a href="quiz/index.php?idQuestionnaire=1"><img src="/quiz/img/cinema.png" class="h-24 w-24 rounded-lg shadow-xl transform hover:-translate-y-2 transition-transform duration-500 ease-in-out"/></div>';
    }
    if ($id=2){
        echo'<div class="space-y-4"><h2 class="text-justify font-mono font-semibold  text-white">Foot</h2><a href="quiz/index.php?idQuestionnaire=2"><img src="/quiz/img/foot.png" class="h-24 w-24 rounded-lg shadow-xl transform hover:-translate-y-2 transition-transform duration-500 ease-in-out"/></div>';
    }
    if ($id=3){
        echo'<div class="space-y-4"><h2 class="text-justify font-mono font-semibold  text-white">Culture générale</h2><a href="quiz/index.php?idQuestionnaire=3"><img src="/quiz/img/cultureg.png" class="h-24 w-24 rounded-lg shadow-xl transform hover:-translate-y-2 transition-transform duration-500 ease-in-out"/></div>';
    }
    ?>
</div>
    </div>
</div>
</body>
</html>