<?php
session_start();
$_SESSION = array();
$_SESSION['login']= "";
$_SESSION['pass']="";
unset($_SESSION['login']);
unset($_SESSION['pass']);
session_destroy();
setcookie("PHPSESSID","",time()-3600,"/"); // delete session cookie  
header('location: login.php');
?>
<script>
// rediriger vers la page de login après la déconnexion
window.location.href = 'login.php';

// détecter si la session a été détruite et recharger la page
if (sessionStorage.getItem('refresh') !== null) {
  sessionStorage.removeItem('refresh');
  location.reload(true);
} else {
  sessionStorage.setItem('refresh', 'true');
}
</script>