<?php
    ini_set('session.gc_maxlifetime', 3600);
    session_start();
    $_SESSION['logMemoria'] = null;
    $_SESSION['logDisco'] = null;

    require_once './class/Conexao.php';
    require_once './class/FuncionarioDAO.php';
    $objFuncionarioDAO = new FuncionarioDAO();

    $_SESSION['bdMemoria'] = $_SESSION['bdDisco'] = $objFuncionarioDAO->list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados 2 - Trabalho Final</title>

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>		


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="script.js"></script>
</head>
<body>

    <?php include 'include/menu.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="page-header">
                    <h3>Recuperação de falhas</h3>
                </div>   
            </div>
            <div class="col-4 text-secondary">
                <small>Recarregue a página para recomeçar o processo!</small>
            </div>                      
        </div>

        <hr>        
        <h5>Operações</h5>
        <div class="row mb-2">
            <div class="col-1">
                <select class="form-select" name="transacao" id="transacao">
                    <option value="T1">T1</option>
                    <option value="T2">T2</option>
                    <option value="T3">T3</option>
                    <option value="T4">T4</option>
                    <option value="T5">T5</option>
                </select>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary iniciaTransacao">Start Transaction</button>
                <button type="button" class="btn btn-success commitTransacao">Commit</button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">UPDATE</div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <label for="">Salário:</label> 
                                <input name="salarioEdt" id="salarioEdt" type="text" class="form-control mb-3">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="">id_funcionario:</label> 
                                <input name="idEdt" id="idEdt" type="number" class="form-control mb-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                            </div>

                            <div class="col-2">
                                <button type="button" class="btn btn-success update">Executar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr>        
        <h5>Simular</h5>
        <button type="button" class="btn btn-success insereCheckpoint">Checkpoint</button>
        <button type="button" class="btn btn-danger falha">Falha</button>
        <hr>        
        <h5>Visualizar</h5>
        <button type="button" class="btn btn-primary visualizarBdBuffer">Banco Buffer</button>
        <button type="button" class="btn btn-info visualizarLogBuffer ">Log Buffer</button>

        <button type="button" class="btn btn-primary ml-4 visualizarBdDisco" >Banco Disco</button>
        <button type="button" class="btn btn-info visualizarLogDisco">Log Disco</button>


        <div class="visualizar">

        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade meu-modal" id="modalJanela" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="conteudo-modal"></div>
            </div>
        </div>
    </div>

</body>
</html>