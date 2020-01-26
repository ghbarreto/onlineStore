<?php
session_start();
session_destroy(); // destroy all the sessions and disconnects the user.
header('Location: ../index.php')
?>