<?php
echo "Logging you out.Please wait...";
session_start();
session_destroy();
header("Location:/forum/index.php?logout=true");
exit();

?>