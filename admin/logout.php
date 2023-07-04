<?php

session_start();

session_destroy();
$_SESSION['Admin'] = NULL;

header("Location: ../../My_Lib");