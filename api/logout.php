<?php

session_start();
$_SESSION["userId"] = null;

header("location: /Library Management");