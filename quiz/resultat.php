<!doctype html>
<html lang="en">
<head>
    <title>Resultat</title>
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
            <a href="/questionnaire.php" class="inline-block p-2 text-pink-600 hover:text-pink-500">Questionnaire</a>
            <a href="/login/deconnexion.php" class="inline-block p-2 text-pink-600 hover:text-pink-500">Deconnexion</a>
        </div>
    </div>
</nav>
<body>
<div class="p-10 min-h-screen flex justify-center bg-gradient-to-r from-pink-600 to-purple-600">
    <div <div class='animated fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col'>
        <h1 class="font-bold text-2xl lg:text-4xl">Resultat</h1>
        <br><br>
<?php
session_start();
//echo $_SESSION['idQuestionnaire'];
include "../src/service/serviceBDD.php";
$bdd=new serviceBDD("localhost", 3306,"bddqcm","root","");
$mysqlConnection=$bdd->getStatement();

$queryIdQuestion="SELECT question.idQuestion FROM bddqcm.question";
$requete=$mysqlConnection->prepare($queryIdQuestion);
$requete->execute();
$resultQueryIdQuestion=$requete->fetchAll();
$score=0;
$numQuestion=1;

foreach ($resultQueryIdQuestion as $keyQuestion=>$idQuestion)
{


//    $queryReponsesQuestions= "SELECT COUNT(questionreponse.idReponse) as 'nbBonneReponse',question.idQuestion FROM bddqcm.questionreponse,bddqcm.question
//                                WHERE questionreponse.idQuestion=question.idQuestion
//                                AND question.idQuestion={$idQuestion[0]} AND nbBonneReponse>1 AND questionreponse.bonne=1";
//    $requete=$mysqlConnection->prepare($queryReponsesQuestions);
//    $requete->execute();
//    $resultQueryReponsesQuestions=$requete->fetchAll();
//    foreach ($resultQueryReponsesQuestions as $keyRQ=>$reponses)
//    {
//
//        if ($reponses[0]>1){
//            echo "is a checkbox";
//        }
//        else
//        {
//            echo "is radio";
//        }
//    }
//        echo "<br><br>";



    if (isset($_POST[$idQuestion[0]]))
    {
        echo "<div > <h2 class='inline-block p-2 text-purple-600 hover:text-purple-500 font-mono font-semibold '>Question n°".$numQuestion.": </h2><br>";
        $numQuestion++;
        $queryBonneReponse="SELECT valeur FROM bddqcm.reponse,bddqcm.questionreponse
                            WHERE reponse.idReponse=questionreponse.idReponse AND idQuestion={$idQuestion[0]} AND questionreponse.bonne=1";
        $requete=$mysqlConnection->prepare($queryBonneReponse);
        $requete->execute();
        $result=$requete->fetchAll();
        if ($_POST[$idQuestion[0]]==$result[0]['valeur'])
        {
            echo "<p class='inline-block p-2 text-white bg-green-300 hover:bg-green-100 hover:text-green-800 rounded transition ease-in duration-150'>Votre réponse : ".$_POST[$idQuestion[0]]."<br></p><br>";
            $score++;
        }
        else
        {
            echo "<p class='inline-block p-2 text-white bg-red-400 hover:bg-red-100 hover:text-red-600 rounded transition ease-in duration-150'>Votre réponse : ".$_POST[$idQuestion[0]]."<br></p><br>";
        }
        echo "<p class='inline-block p-2 text-white bg-green-300 hover:bg-green-100 hover:text-green-600 rounded transition ease-in duration-150'>La bonne réponse est : ".$result[0]['valeur']."<br></p><br><br>";
    }
}
echo"<h2 class='inline-block p-2 text-pink-600 hover:text-pink-500'>Votre score: ".$score." points !</h2>";
?>

<div class='flex justify-center'><input class="inline-block p-2 text-white bg-pink-600 hover:bg-pink-300 hover:text-pink-800 rounded transition ease-in duration-150" type="button" value="Retour" onclick="document.location.href='../questionnaire.php'">
    </div>