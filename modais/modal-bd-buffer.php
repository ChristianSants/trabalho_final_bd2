<?php
    session_start();

    echo '
        <div class="modal-header bg-primary text-white">
            <h6 class="modal-title">BD BUFFER</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-12">';

    foreach($_SESSION['bdMemoria'] as $id => $umFuncionario){
        echo '<b>Id:</b> '.$id.' <b>Nome:</b> '
        .$umFuncionario['nome'].' <b>Salário:</b> '.$umFuncionario['salario'].'<br>';
    }
                    
    echo
                '</div>
                <div class="mensagem-modal"></div>
            </div>
        </div>

        <!--
        <div class="modal-footer">
            <button type="button" class="btn btn-success salvar" >Salvar</button>
        </div> -->
    ';