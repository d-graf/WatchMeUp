<?php
session_start();
session_destroy();
header('Location: /');
exit ('Sie konnten nicht Abgemeldet werden. Versuchen Sie es erneut.');
?>