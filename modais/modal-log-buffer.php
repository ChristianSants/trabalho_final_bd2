<?php
    session_start();

    echo '
        <div class="modal-header bg-primary text-white">
            <h6 class="modal-title">LOG BUFFER</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-12">
                    '.$_SESSION['logMemoria'].'
                </div>				

                <div class="mensagem-modal"></div>
            </div>
        </div>

        <!--
        <div class="modal-footer">
            <button type="button" class="btn btn-success salvar" >Salvar</button>
        </div> -->
    ';