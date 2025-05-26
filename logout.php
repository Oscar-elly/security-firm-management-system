<?php
session_start();
session_destroy();
header("Location: login.php"); //helps in logging out automatically

exit;
