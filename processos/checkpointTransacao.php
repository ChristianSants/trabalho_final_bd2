<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] .= htmlspecialchars("checkpoint") . "<br>";
    $_SESSION['logDisco'] = $_SESSION['logMemoria'];

    $_SESSION['bdDisco'] = $_SESSION['bdMemoria'];

    echo "
        <script>
            alert('Checkpoint inserido!')
        </script>
    ";