const validacoes = {};

validacoes.email = function(email, element) {
    $.ajax({
        url: router.url + router.prefix.toLowerCase() + '/utills/valida-usuario-email',
        data: {
            email: email
        },
        dataType: 'JSON',
        method: 'POST',
        success: function(res) {

            if (res.code == 203 || res.code == 204) {
                $(element).val('')
                $(element).addClass('error')
                $(element).after('<span class="message-error">' + res.message + '</span>')
            }
        }
    })
}

validacoes.CNPJ = function(cnpj, empresa, element) {

    $.ajax({
        url: router.url + router.prefix.toLowerCase() + '/utills/valida-cnpj-empresa',
        data: {
            cnpj: cnpj,
        },
        dataType: 'JSON',
        method: 'POST',
        success: function(res) {

            if (res.code == 203 || res.code == 204) {
                $(element).val('')
                $(element).addClass('error')
                $(element).after('<span class="message-error">' + res.message + '</span>')
            }
        }
    })

}

validacoes.email_inicial = ''
validacoes.cnpj_inicial = ''

$(document).ready(function() {

    validacoes.email_inicial = $('.verifica-email').val()
    validacoes.cnpj_inicial = $('.verifica-cnpj').val()

    $('.verifica-email').change(function() {
        let email = $(this).val()

        $(this).removeClass('error')
        $(this).parent().children('.message-error').remove()

        if (email != '' && email != validacoes.email_inicial) {
            validacoes.email(email, $(this))
        }
    })

    $('.verifica-cnpj').change(function() {
        let cnpj = $(this).val()
        let empresa = $('#empresa-id').val();
        console.log(empresa)

        $(this).removeClass('error')
        $(this).parent().children('.message-error').remove()

        if (cnpj != '' && cnpj != validacoes.cnpj_inicial) {
            validacoes.CNPJ(cnpj, empresa, $(this))
        }
    })

})