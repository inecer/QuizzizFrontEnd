<?php
include "../src/service/serviceBDD.php";
session_start();
$bdd=new serviceBDD("localhost", 3306,"bddqcm","root","");
$mysqlConnection=$bdd->getStatement();
$_SESSION['idQuestionnaire']=$_GET['idQuestionnaire'];
$queryLibelleQuestionnaire="SELECT questionnaire.libelleQuestionnaire FROM bddqcm.questionnaire WHERE idQuestionnaire={$_GET['idQuestionnaire']}";
$requete=$mysqlConnection->prepare($queryLibelleQuestionnaire);
$requete->execute();
$resultQueryLibelleQuestionnaire=$requete->fetchAll();

echo "<form action='resultat.php' method='post'>";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Quiz</title>
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
    </nav>
    <body>
    <div class="bg-gradient-to-r from-pink-600 to-purple-600 items-center">
    </body>
<?php

foreach ($resultQueryLibelleQuestionnaire as $keyLibelleQuestionnaire=>$libelleQuestionnaire)
{
    echo "<h1 class='text-white text-center font-bold text-2xl lg:text-4xl'>$libelleQuestionnaire[0]</h1>";
    $queryIdQuestionQuestionnaire="SELECT idQuestion FROM bddqcm.questionquestionnaire WHERE idQuestionnaire={$_GET['idQuestionnaire']}";
    $requete=$mysqlConnection->prepare($queryIdQuestionQuestionnaire);
    $requete->execute();
    $resultQueryIdQuestionQuestionnaire=$requete->fetchAll();
    $numQuestion=1;
    foreach ($resultQueryIdQuestionQuestionnaire as $keyIdQuestion=>$idQuestion)
    {
        $queryNbBonneReponse="SELECT question.nbBonneReponse FROM bddqcm.question WHERE question.idQuestion={$idQuestion[0]}";
        $requete=$mysqlConnection->prepare($queryNbBonneReponse);
        $requete->execute();
        $resultQueryNbBonneReponse=$requete->fetchAll();
        ?>
        <div class='animated fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">'>
            <?php
        echo "Question n° ".$numQuestion." :<br><br>";
        $numQuestion++;
        $queryQuestionQuestionnaire="SELECT libelleQuestion FROM bddqcm.question WHERE idQuestion={$idQuestion[0]}";
        $requete=$mysqlConnection->prepare($queryQuestionQuestionnaire);
        $requete->execute();
        $resultQueryQuestionQuestionnaire=$requete->fetchAll();
        echo "<fieldset>";
        foreach ($resultQueryQuestionQuestionnaire as $keyQuestion=>$question)
        {
            echo "<p class='text-3xl text-center font-hairline md:leading-loose text-grey md:mt-8 mb-4'>$question[0]</p>"."<br><br>";
            $queryIdReponse="SELECT questionreponse.idReponse FROM bddqcm.questionreponse WHERE idQuestion={$idQuestion[0]}";
            $requete=$mysqlConnection->prepare($queryIdReponse);
            $requete->execute();
            $resultQueryIdReponse=$requete->fetchAll();
            foreach ($resultQueryIdReponse as $keyResult=>$idReponse)
            {
                $queryReponse="SELECT reponse.valeur FROM bddqcm.reponse WHERE reponse.idReponse={$idReponse[0]}";
                $requete=$mysqlConnection->prepare($queryReponse);
                $requete->execute();
                $resultQueryReponse=$requete->fetchAll();
                foreach ($resultQueryReponse as $keyReslut=>$valeurReponse)
                {
                    if ($resultQueryNbBonneReponse[0]['nbBonneReponse']>1)
                    {
                        echo "<input type='checkbox' name='$idReponse[0]' value='$valeurReponse[0]'>".$valeurReponse[0]."<br><br>";
                    }
                    else
                    {
                        echo "<input type='radio' name='$idQuestion[0]' value='$valeurReponse[0]' required>".$valeurReponse[0]."<br><br>";
                    }
                }
            }
        }
        ?>
        </div>
        <?php
    }
}
echo "<div class='flex justify-center'>
    <button class='inline-block p-2 text-white bg-pink-600 hover:bg-pink-300 hover:text-pink-800 rounded transition ease-in duration-150 ' type='submit'>Résultat</button>
    </div>";
echo "</form>";