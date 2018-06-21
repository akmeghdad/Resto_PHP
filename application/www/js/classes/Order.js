'use strict';
$(function(){
    $('#meal').on('click', changeArticle);
    $('#js_add_product').on('click', addProduct);
        //use 'of' to link the tooltip to your specified input
        // position: { of: '#quantity_', my: 'left center', at: 'left center' },
    $('#quantity_').on('input', quantityInput);
    $(document).on('click', "#js_button-cancel",removeProduct);

    // $('#order-form').submit(addProduct);
    // $('fieldset').on('submit', '#js_add_product', addProduct);

    // console.log(getRequestUrl()); // http://.../Restaurant/index.php
    // console.log(getWwwUrl()); // http://.../Restaurant/application/www
    showCommande();
    
});

function removeProduct(){
    // console.log('5454');
    var commends = JSON.parse(localStorage.getItem('listCommande'));
    var value = $.makeArray(commends);
    var dataID = $(this).data('meal-id');
    var i;
    // console.log(value)

    // has = true;
    // if(data[i].id == id) {
    //     data.splice(i, 1);
    //     break;
    // }
    for (i in value) {
        if (value[i].id == dataID) {
            value.splice(i, 1);
            break;
        }
    }

    // if (has) {
    //     value.push(data);
    // }
    // console.log(value)

    var tmpStorage = JSON.stringify(value);
    localStorage.setItem('listCommande', tmpStorage);
    showCommande();
}

function changeArticle() {
    $.getJSON(getRequestUrl() + '/order' , {
            id:  $(this).val()
        },
        function (data, textStatus, jqXHR) {
            $("#meal-details img").attr('src', getWwwUrl() + '/images/meals/' + data.photo)
            $("#meal-details p").text(data.description);
            $("#meal-details span strong").text(data.price_sale + ' €');
        }
    );
}

function addProduct() {
    if(quantityInput() ){
        $.getJSON(getRequestUrl() + '/order', {
            id:  $('#meal').val()
        },
            function (data, textStatus, jqXHR) {
                // var commendsArray = [];
                
                data.quantity = parseFloat($('#quantity_').val());
                data.price_total = data.quantity * data.price_buy;
                // console.log(data);
                findCommends(data);
                
                $("#quantity_").val('');

                
                showCommande();
            }
        );
        // $("#validate_order").prop("disabled", false);
    }
    
}

function quantityInput() {
    $("#js_add_product").prop("disabled",false);
    
    $("#quantity_").formError({
        remove:true,
        successImage: {enabled:false}
        });

    var regl = /^[0-9]{1,2}$/;
    if ((regl.test($("#quantity_").val()) == false) ) {
    // if ( !isInteger($(this).val()) && isNaN($(this).val())) {
        $("#js_add_product").prop("disabled",true);
        $('#quantity_').formError( "Only Number");
        return false;
    }
    return true;
}

function findCommends(data) {
    var commends = JSON.parse(localStorage.getItem('listCommande'));
    var value = $.makeArray(commends);
    var has,i;
    // console.log(value)

    has = true;

    for (i in value) {
        if (value[i].id == data.id) {
            value[i].price_total += data.quantity * data.price_buy;
            value[i].quantity += data.quantity ;
            has = false;
            break; //Stop this loop, we found it!
        }
    }

    if (has) {
        value.push(data);
    }
    // console.log(value)

    var tmpStorage = JSON.stringify(value);
    localStorage.setItem('listCommande', tmpStorage);
    
}

function showCommande() {
    

    $('.generic-table').html(function(){
        var commends = localStorage.getItem('listCommande');
        commends = JSON.parse(commends);
        if(isNaN(commends)){
            // console.log(commends);

            var htmlShow = 
                    '<table class="generic-table">'+
                    '<thead>'+
                    '    <tr>'+
                    '        <th class="number">Quantité</th>'+
                    '        <th>Produit</th>'+
                    '        <th class="number">Prix Unitaire</th>'+
                    '        <th class="number">Prix Total</th>'+
                    '        <th></th>'+
                    '    </tr>'+
                    '</thead>'+
                    '<tbody>';

            for (let i = 0; i < Object.keys(commends).length; i++) {
            // console.log(commends[i]);
                
                htmlShow +=
                '<tr>'+
                '    <td class="number">'+ commends[i].quantity +'</td>'+
                '    <td><strong>'+ commends[i].name +'</strong></td>'+
                '    <td class="number">'+ commends[i].price_buy  +' €</td>'+
                '    <td class="number">'+ commends[i].price_total  +' €</td>'+
                '    <td>'+
                '        <button class="button button-cancel small" id="js_button-cancel" title="Supprimer l\'article" data-meal-id="'+ commends[i].id  +'">'+
                '            <i class="fa fa-trash"></i>'+
                '        </button>'+
                '    </td>'+
                '</tr>';
            }
            $("#validate_order").prop("disabled", false);
            
            htmlShow += '</tbody></table>';

            return htmlShow;
        }else{
            var htmlShow = 
            '<table class="generic-table">'+
            '    <tbody>'+
            '        <tr>'+
            '            <td class="basket-empty">Votre panier est vide pour le moment !</td>'+
            '        </tr>'+
            '    </tbody>'+
            '</table>';
            $("#validate_order").prop("disabled", true);
            
            return htmlShow;
        }


    })
    
    //                         <tr>
    //                 <td class="number">41</td>
    //                 <td><strong>Coca-Cola</strong></td>
    //                 <td class="number">3.00 €</td>
    //                 <td class="number">123.00 €</td>
    //                 <td>
    //                     <button class="button button-cancel small" title="Supprimer l'article" data-meal-id="1">
    //                         <i class="fa fa-trash"></i>
    //                     </button>
    //                 </td>
    //             </tr>
    //                 </tbody>
    // </table>
}

