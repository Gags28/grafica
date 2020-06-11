const empresa = {}

empresa.start = function() {
    $('.add-empresa').click(function() {
        $('#modal-add').modal('show')
    })

    $('.add-unidade').click(function() {
        $('#modal-add-unidade').modal('show')
    })

    $('.edit-user').click(function() {
        id = $(this).attr('empresa-id')
        $('#modal-edit').modal('show')
        empresa.resetForm()
        empresa.getEmpresa(id)
    })

    $('.edit-unidade').click(function() {
        id = $(this).attr('unidade-id')
        $('#modal-edit-unidade').modal('show')
        empresa.resetFormUnidade()
        empresa.getUnidade(id)
    })
}

empresa.getEmpresa = function(id) {
    $.ajax({
        url: router.url + router.prefix.toLowerCase() + '/empresas/get-empresa',
        data: {
            id: id
        },
        dataType: 'JSON',
        method: 'POST',
        success: function(res) {
            if (res.code === 200) {
                data = res.data

                $('#edit-empresa #id').val(data.id)
                $('#edit-empresa #nome').val(data.nome)
                $('#edit-empresa #nome-resposavel').val(data.nome_resposavel)
                $('#edit-empresa #email-responsavel').val(data.email_responsavel)
                $('#edit-empresa #telefone-responsavel').val(data.telefone_responsavel)

                if (data.status == 1) {
                    $('.status').removeClass('btn-outline-success')
                    $('.status').addClass('btn-outline-danger')
                    $('.status').html('Inativar')
                } else {
                    $('.status').removeClass('btn-outline-danger')
                    $('.status').addClass('btn-outline-success')
                    $('.status').html('Ativar')
                };

                $('.status').attr('href', router.url + 'admin/empresas/status/' + data.id)
            }
            if (res.code === 204) {
                console.log('Usuário não encontrado')
            }
        }
    })
}

empresa.getUnidade = function(id) {
    $.ajax({
        url: router.url + router.prefix.toLowerCase() + '/empresas/get-unidade',
        data: {
            id: id
        },
        dataType: 'JSON',
        method: 'POST',
        success: function(res) {
            if (res.code === 200) {
                data = res.data

                $('#edit-unidade #id').val(data.id)
                $('#edit-unidade #empresa-id').val(data.empresa_id)
                $('#edit-unidade #cnpj').val(data.cnpj)
                $('#edit-unidade #rua').val(data.rua)
                $('#edit-unidade #numero').val(data.numero)
                $('#edit-unidade #complemento').val(data.complemento)
                $('#edit-unidade #bairro').val(data.bairro)
                $('#edit-unidade #cidade').val(data.cidade)
                $('#edit-unidade #estado').val(data.estado)

                validacoes.cnpj_inicial = data.cnpj

                if (data.status == 1) {
                    $('.status').removeClass('btn-outline-success')
                    $('.status').addClass('btn-outline-danger')
                    $('.status').html('Inativar')
                } else {
                    $('.status').removeClass('btn-outline-danger')
                    $('.status').addClass('btn-outline-success')
                    $('.status').html('Ativar')
                };

                $('.status').attr('href', router.url + 'admin/empresas/status-unidade/' + data.id)
            }
            if (res.code === 204) {
                console.log('Usuário não encontrado')
            }
        }
    })
}

empresa.resetForm = function() {
    $('#edit-empresa #id').val('')
    $('#edit-empresa #nome').val('')
    $('#edit-empresa #nome-resposavel').val('')
    $('#edit-empresa #email-responsavel').val('')
    $('#edit-empresa #telefone-responsavel').val('')
}

empresa.resetFormUnidade = function() {
    $('#edit-unidade #id').val('')
    $('#edit-unidade #empresa-id').val('')
    $('#edit-unidade #cnpj').val('')
    $('#edit-unidade #rua').val('')
    $('#edit-unidade #numero').val('')
    $('#edit-unidade #complemento').val('')
    $('#edit-unidade #bairro').val('')
    $('#edit-unidade #cidade').val('')
    $('#edit-unidade #estado').val('')
}


empresa.start()