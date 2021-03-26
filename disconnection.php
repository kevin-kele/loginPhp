<?php
session_start();
session_unset(); // desactive la session
session_destroy(); // detruit la session 

header('location:./index.php');
