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
            $(element).removeClass('error')
            $(element).parent().children('.message-error').remove()
            if (res.code == 203 || res.code == 204) {
                $(element).val('')
                $(element).addClass('error')
                $(element).after('<span class="message-error">' + res.message + '</span>')
            }
        }
    })
}


$(document).ready(function() {

    email_inicial = $('.verifica-email').val()

    $('.verifica-email').change(function() {
        email = $(this).val()

        if (email != '' && email != email_inicial) {
            validacoes.email(email, $(this))
        }
    })

})