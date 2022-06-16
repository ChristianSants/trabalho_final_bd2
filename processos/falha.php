<?php
    session_start();
    extract($_POST);

    $_SESSION['logMemoria'] = $_SESSION['bdMemoria'] = null;
    
    $log = explode('<br>', $_SESSION['logDisco']);

    //REDO
    $operacoes = [];
    foreach($log as $umaLinha){
        if(preg_match('/\w+\, \w+\, \w+\, \w+/', $umaLinha)){
            $umaLinhaEditada = str_replace([htmlspecialchars('<'),htmlspecialchars('>')], '', $umaLinha);
            $coluna = explode(',', $umaLinhaEditada);
            $operacoes[$coluna[0]] = array(
                "idFuncionario" => trim($coluna[2]),
                "colunaBanco" => trim($coluna[3]),
                "valorAntigo" => trim($coluna[4]),
                "valorNovo" => trim($coluna[5])
            );
        }

        if($umaLinha == 'checkpoint'){
            $operacoes = [];
        }

        //encontrar os fins para realmente refazer
        if(preg_match('/FIM T[0-9]{1}/', $umaLinha)){
            preg_match('/T[0-9]{1}/', $umaLinha, $transacaoFim);
            $redo = $operacoes[$transacaoFim[0]];
            $_SESSION['bdDisco'][$redo['idFuncionario']][$redo['colunaBanco']] = $redo['valorNovo'];
        }
    }

    //UNDO
    $fins = [];
    for($i = count($log)-1; $i > 0; $i--){
        //encontrar os fins para saber se tem que fazer undo
        if(preg_match('/FIM T[0-9]{1}/', $log[$i])){
            preg_match('/T[0-9]{1}/', $log[$i], $transacaoFim);
            $fins[] = $transacaoFim[0];
        }

        if(preg_match('/\w+\, \w+\, \w+\, \w+/', $log[$i])){
            $umaLinhaEditada = str_replace([htmlspecialchars('<'),htmlspecialchars('>')], '', $log[$i]);
            $coluna = explode(',', $umaLinhaEditada);
            $transacao = trim($coluna[0]);
            $idFuncionario = trim($coluna[2]);
            $colunaBanco = trim($coluna[3]);
            $valorAntigo = trim($coluna[4]);
            $valorNovo = trim($coluna[5]);

            if(!in_array($transacao, $fins)){
                $_SESSION['bdDisco'][$idFuncionario][$colunaBanco] = $valorAntigo;
            }
        }
    }

    $_SESSION['bdMemoria'] = $_SESSION['bdDisco'];

    echo "
        <script>
            alert('Banco recuperado com sucesso!')
        </script>
    ";