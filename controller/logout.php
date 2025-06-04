<?php
session_start();
session_destroy();
header("Location: /back-up/index.php?logout=1");
exit();
