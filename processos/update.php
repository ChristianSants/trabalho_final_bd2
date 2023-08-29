<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] .= htmlspecialchars("<$transacao, funcionarios, $idFuncionario, salario, "
    . $_SESSION['bdMemoria'][$idFuncionario]['salario'] .", $salario>") . "<br>";
    $_SESSION['bdMemoria'][$idFuncionario]['salario'] = $salario;

    echo "
        <script>
            alert('Atualizado com sucesso!')
        </script>
    ";