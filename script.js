$(function(e){

    /**
     * TRANSAÇÕES
     */
    // inicia transacao
    $('.iniciaTransacao').on('click', function(e){
        let transacao= $('#transacao').val()
        $.post('processos/iniciaTransacao.php', {
            transacao: transacao
        }).done(function(data){
        })
    })

    // commit transacao
    $('.commitTransacao').on('click', function(e){
        let transacao= $('#transacao').val()
        $.post('processos/commitTransacao.php', {
            transacao: transacao
        }).done(function(data){
        })
    }) 

    //insereCheckpoint
    $('.insereCheckpoint').on('click', function(e){
        $.post('processos/checkpointTransacao.php', {
        }).done(function(data){
        })
    }) 



    /**
     * VISUALIZAR
     */
    // log buffer
    $('.visualizarLogBuffer').on('click', function(e){
        $('.meu-modal').modal({backdrop: 'static', keyboard: true});
        $('.conteudo-modal').html('')

        $.post('modais/modal-log-buffer.php',{
        }).done(function(data){
            $('.conteudo-modal').html(data) 
        })

        $('.meu-modal').modal('toggle')
    })

    // log disco
    $('.visualizarLogDisco').on('click', function(e){
        $('.meu-modal').modal({backdrop: 'static', keyboard: true});
        $('.conteudo-modal').html('')

        $.post('modais/modal-log-disco.php',{
        }).done(function(data){
            $('.conteudo-modal').html(data) 
        })

        $('.meu-modal').modal('toggle')
    })

    // bd buffer
    $('.visualizarBdBuffer').on('click', function(e){
        $('.meu-modal').modal({backdrop: 'static', keyboard: true});
        $('.conteudo-modal').html('')

        $.post('modais/modal-bd-buffer.php',{
        }).done(function(data){
            $('.conteudo-modal').html(data) 
        })

        $('.meu-modal').modal('toggle')
    })

    // bd disco
    $('.visualizarBdDisco').on('click', function(e){
        $('.meu-modal').modal({backdrop: 'static', keyboard: true});
        $('.conteudo-modal').html('')

        $.post('modais/modal-bd-disco.php',{
        }).done(function(data){
            $('.conteudo-modal').html(data) 
        })

        $('.meu-modal').modal('toggle')
    })
})