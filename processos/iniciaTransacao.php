<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] .= htmlspecialchars("<INICIO $transacao>") . "<br>";

    echo "
        <script>
            alert('Transação inciada!')
        </script>
    ";