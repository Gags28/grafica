card = {}


card.select = function() {

    let url = $('#card').attr('href')

    $('.card-disclaimer').click(function() {

        $('.card-disclaimer').each(function() {
            $(this).removeClass('card-selected')
        })

        $(this).addClass('card-selected');

        $('#card').attr('href', url + '/' + $(this).attr('card'))
        $('#card').removeAttr('disabled', 'false')
    })
}

card.getFuncionario = function() {

    console.log($('#nome-completo'))

    $('#nome-completo').change(function() {

        id = $(this).val()
        $.ajax({
            url: router.url + router.prefix.toLowerCase() + '/pedidos/get-funcionario',
            dataType: 'JSON',
            method: 'POST',
            data: {
                id: id
            },
            success: function(res) {
                console.log(res)

                for (val in res.data) {
                    console.log(val)
                    console.log($('#' + val))

                    if ($('#' + val).length) {

                        console.log(res.data[val])

                        $('#' + val).val(res.data[val])
                    }
                }
            }
        })

    })

}

card.select()
card.getFuncionario()