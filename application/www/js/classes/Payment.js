'use strict';
$(function () {
    $(document).on('click', "#validate_order", saveOrderSql);
    // $("#prenom").on('input', prenomInput);
    // $("#adresse").on('input', adresseInput);
    // $("#ville").on('input', villeInput);
    // $("#code_postal").on('input', code_postalInput);
    // $("#phone").on('input', phoneInput);
    // $("#mail").on('input', mailInput);
    // $("#mdp").on('input', mdpInput);

    // nomInput();
    // prenomInput();
    // villeInput();
    // adresseInput()
    // code_postalInput();
    // phoneInput();
    // mailInput();
    // mdpInput();

    // changeInput()
    // $("#nom").on('input', changeInput);
    // $("#nom").on('input', changeInput);
    // $("#nom").on('input', changeInput);


});

function saveOrderSql() {
    var orderSend = [];
    var localJson = localStorage.getItem('listCommande');
    localJson = JSON.parse(localJson);

    var orderIfo = $.makeArray(localJson);

    for (let i = 0; i < orderIfo.length; i++) {
        orderSend[i] = {
            'id'        : orderIfo[i].id,
            'quantity'  : orderIfo[i].quantity
        }
    }

    console.log(orderSend);
    // console.log(orderIfo);

    $.get(getRequestUrl() + '/order', {
        payment: orderSend,
    },
        function (data, textStatus, jqXHR) {
         console.log(data)   ;
        }
    );
}
    