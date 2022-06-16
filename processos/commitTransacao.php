<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] .= htmlspecialchars("<FIM $transacao>") . "<br>";
    $_SESSION['logDisco'] = $_SESSION['logMemoria'];

    $_SESSION['bdDisco'] = $_SESSION['bdMemoria'];

    echo "
        <script>
            alert('Commit realizado!')
        </script>
    ";