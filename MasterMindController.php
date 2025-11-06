<?php
require "MasterMindModel.php";

session_start();

if (isset($_GET['restart'])) {
  session_destroy();
  header('Location:MasterMindController.php');
  exit;
};


if (!isset($_SESSION['current_game'])) {
  if (isset($_GET['length']) && $_GET['length']<9) {
    $_SESSION['initialisation'] = true;
    $_SESSION['status']=3;
    $_SESSION['current_game'] = new MasterMindClass($_GET['length']);
    header('Location:MasterMindView.php');
    exit;
  } else {
    $_SESSION['initialisation'] = false;
    $_SESSION['status']=3;
    header('Location:MasterMindView.php');
    exit;
  }
} 

if ($_SESSION['initialisation']) {
  if ($_SERVER['REQUEST_METHOD']==="GET" && isset($_GET['attempt'])) {
    $result = verifierProp($_GET['attempt'],$_SESSION['current_game']);
    // 0 -> error, 1 -> won the game, 2 -> failed attempt 3 -> base (ignore)
    switch ($result) {
      case 0:
        $_SESSION['status']=0;
        header('Location:MasterMindView.php');
        exit;
        break;
      case 1:
        $_SESSION['status']=1;
        header('Location:MasterMindView.php');
        exit;
        break;
      default:
        $_SESSION['status']=2;
        $_SESSION['current_game']->ajouterEssaie($_GET['attempt'],$result);
        header('Location:MasterMindView.php');
        exit;
        break;
    }
  }
}
header('Location:MasterMindView.php');
exit;
?>

