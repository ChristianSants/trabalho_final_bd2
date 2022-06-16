<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] .= htmlspecialchars("<FIM $transacao>") . "<br>";
    $_SESSION['logDisco'] = $_SESSION['logMemoria'];

    echo ($_SESSION['logMemoria']);
