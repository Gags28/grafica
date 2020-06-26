const pedidos = {}

pedidos.init = function() {
    pedidos.show()
}

pedidos.show = function() {
    $('.pedido-show').click(function() {
        $('#detalhes-pedido').modal('show')
        id = $(this).attr('pedido-id')
        pedidos.getPedido(id)
    })
}

pedidos.getPedido = function(id) {

    $.ajax({
        url: router.url + router.prefix.toLowerCase() + '/pedidos/get-pedido',
        data: {
            id: id
        },
        dataType: 'JSON',
        method: 'POST',
        success: function(res) {
            if (res.code === 200) {

                a = res.data[0]

                $('#data-pedido').html('')
                $('#empresa').html('')
                $('#faturamento').html('')
                $('#endereco').html('')
                $('#usuario-pedido').html('')
                $('#usuario-email').html('')
                $('#cartoes').html('')

                $('#data-pedido').html('Data:<span class="pl-10 text-dark"> ' + pedidos.formatarData(a.data) + ' </span>')
                $('#empresa').html('Empresa:<span class="pl-10 text-dark">' + a.empresa_cnpj.empresa.nome + '</span>')
                $('#faturamento').html('<span class="d-block">CNPJ: ' + pedidos.mask(a.empresa_cnpj.cnpj, '##.###.###/####-##') + ' </span> <span class="d-block"> ' + a.empresa_cnpj.empresa.email_responsavel + ' </span>  <span class="d-block"> ' + pedidos.formatPhone(a.empresa_cnpj.empresa.telefone_responsavel) + ' </span> ')
                $('#endereco').html(a.entrega)
                $('#usuario-pedido').html('Solicitante: <span class="text-dark">' + a.usuario.nome + '</span>')
                $('#usuario-email').html('Email: <span class="text-dark"> ' + a.usuario.email + '</span>')

                a.item.map(function(val) {
                    $('#cartoes').append('<tr> <td class="w-70"> ' + val.carto.nome + ' </td> <td class="text-right"> ' + val.quantidade + ' </td> <td class="text-right"> <a href=' + router.url + router.prefix.toLowerCase() + '/pedidos/cartao/' + val.cartao_id + '/' + val.id + ' target="_blank" > <div class="icon dripicons-download"> </div> <a> </td>  </tr>')
                })

            }
        }
    })
}

pedidos.formatPhone = function(phone) {
    //normalize string and remove all unnecessary characters
    phone = phone.replace(/[^\d]/g, "");

    //check if number length equals to 10
    if (phone.length == 11) {
        //reformat and return phone number
        return phone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    }
    if (phone.length == 10) {
        //reformat and return phone number
        return phone.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    }

    if (phone.length == 9) {
        //reformat and return phone number
        return phone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    }
    if (phone.length == 8) {
        //reformat and return phone number
        return phone.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    }

    return null;
}

pedidos.formatarData = function(data) {
    data = a.data.split('T')
    hora = data[1].split('-')
    hora = hora[0]
    hora = hora.slice(0, 5)
    hora = hora.replace(':', 'h')
    data[0] = data[0].replace('-', '/')
    data[0] = data[0].replace('-', '/')
    data = data[0].split('/')
    data = data[2] + '/' + data[1] + '/' + data[0]
    dateTime = data + ' ' + hora

    return dateTime
}

pedidos.init()


pedidos.mask = function(val, mask) {
    let maskared = '';
    let k = 0;
    for (let i = 0; i <= mask.length - 1; i++) {

        if (mask[i] == '#') {
            if (val[k])
                maskared += val[k++];
        } else {
            if (mask[i])
                maskared += mask[i];
        }
    }
    return maskared;
}