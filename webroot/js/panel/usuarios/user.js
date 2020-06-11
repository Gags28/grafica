const usuario = {}

usuario.editCall = function() {
    $('.edit-user').click(function() {
        id = $(this).attr('user-id')
        $('#modal-edit').modal('show')
        usuario.resetForm()
        usuario.getUser(id)
    })

    $('.add-user').click(function() {
        $('#modal-add').modal('show')
    })
}

usuario.getUser = function(id) {
    $.ajax({
        url: router.url + router.prefix.toLowerCase() + '/usuarios/get-user',
        data: {
            id: id
        },
        dataType: 'JSON',
        method: 'POST',
        success: function(res) {
            if (res.code === 200) {
                data = res.data
                console.log(data)
                $('#id').val(data.id)
                $('#nome').val(data.nome)
                $('#email').val(data.email)
                $('#telefone').val(data.telefone)
                $('#limite-pedidos').val(res.data.limite_pedidos)
                $('#tipo').val(data.tipo)
                $('#empresa-cnpj-id').val(data.empresa_cnpj.id);
                $('#empresa-cnpj-id').trigger('change');

                validacoes.email_inicial = data.email

                if (data.status == 1) {
                    $('.status').removeClass('btn-outline-success')
                    $('.status').addClass('btn-outline-danger')
                    $('.status').html('Inativar')
                } else {
                    $('.status').removeClass('btn-outline-danger')
                    $('.status').addClass('btn-outline-success')
                    $('.status').html('Ativar')
                };

                $('.status').attr('href', router.url + 'admin/usuarios/status/' + data.id)
            }
            if (res.code === 204) {
                console.log('Usuário não encontrado')
            }
        }
    })
}

usuario.resetForm = function() {
    $('#nome').val('')
    $('#email').val('')
    $('#telefone').val('')
    $('#limite-pedidos').val('')
    $('#tipo').val('')
    $('#empresa').val('');
    $('#empresa').trigger('change');
}

usuario.editCall()