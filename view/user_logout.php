<?php
session_start();
unset($_SESSION['loggedin']);
session_destroy();
header('Location: /');
exit ('Sie konnten nicht Abgemeldet werden. Versuchen Sie es erneut.');
?>