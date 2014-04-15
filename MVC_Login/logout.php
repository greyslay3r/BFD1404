<?php

session_start();
unset($_SESSION['userInfo']);

header('Location: auth.php');
exit;//manually stops the page



?>