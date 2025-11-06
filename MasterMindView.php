<?php

require 'MasterMindModel.php';

session_start();

function msg(int $n): bool {
  switch ($n) {
    case 0:
      echo "<p>Erreur : saisie invalide. Réessayez.</p>";
      return false;   
    case 1:
      echo "<p>Le jeu est terminé !</p><p>Gagné !</p>";
      return false;              
    case 2:
      return true;               
    default:
      return false;
  }
}

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="MasterMindStyle.css">
    <title>MasterMind</title>
  </head>
  <body>
    <h1>MasterMind</h1>
    <p>Vueillez saisir successivement des combinaisons de chiffres jusqu'a la victoire!</p>
    <form method="get" action="MasterMindController.php">
    <?php 
    if (!$_SESSION['initialisation']) {
    echo "<input type='number' name='length' placeholder='Enter length of code (8 max):' min='1' max='8' autofocus required><br><br><button type = 'submit'>Start</button>";
    } else { ?>
      <table border="1">
        <?php
        if (msg($_SESSION['status'])) { 
?>
      <table border="1">
        <tr>
          <th>numero</th>
          <th>proposition</th>
          <th>Bien place(s)</th>
          <th>Mal Place</th>
      </tr> 
          <?php 
        $essais = $_SESSION['current_game']->getEssaies();
        foreach ($essais as $e) {
        ?>
        <tr>
          <td><?= htmlspecialchars((string)$e['numero']) ?></td>
          <td><?= htmlspecialchars((string)$e['proposition']) ?></td>
          <td><?= htmlspecialchars((string)$e['bienPlace']) ?></td>
          <td><?= htmlspecialchars((string)$e['malPlace']) ?></td>
        </tr>
        <?php
        }}
        ?>
      </table>
      <input type="text" name="attempt" placeholder="Try a code" autofocus>
      <button type="submit">Valider</button>
      <button name="restart">restart</button>
      <?php } ?>
    </form>
  </body>
</html>
