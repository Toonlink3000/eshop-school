<?php

require_once "../utils/user.php";

\User\Logout();
header("Location: index.php");
die();