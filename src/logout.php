<?php
session_start();
session_unset();
session_destroy();
header("Location: /cifralis/public/front_login.php");
exit();
?>