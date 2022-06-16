<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] .= htmlspecialchars("checkpoint") . "<br>";
    $_SESSION['logDisco'] = $_SESSION['logMemoria'];

    echo ($_SESSION['logMemoria']);
