'use strict';
$(function(){
    $("#nom").on('input', nomInput);
    $("#prenom").on('input', prenomInput);
    $("#adresse").on('input', adresseInput);
    $("#ville").on('input', villeInput);
    $("#code_postal").on('input', code_postalInput);
    $("#phone").on('input', phoneInput);
    $("#mail").on('input', mailInput);
    $("#mdp").on('input', mdpInput);
    
    nomInput();
    prenomInput();
    villeInput();
    adresseInput()
    code_postalInput();
    phoneInput();
    mailInput();
    mdpInput();

    changeInput()
    // $("#nom").on('input', changeInput);
    // $("#nom").on('input', changeInput);
    // $("#nom").on('input', changeInput);


});

function changeInput() {
    if ($(".invalid").length == 0) {
        $("#js_creat").prop("disabled", false);
    }else{
        $("#js_creat").prop("disabled", true);
    }

    // $(this).formError({
    //     remove:true,
    //     successImage: {enabled:false}
    //     });

    // $(this).formError( "Only Number");

    // var zz = $("main").find(".invalid").css( "background-color", "#326f51" );

    // console.log(zz);
    
}

function nomInput() {
    var bls = $("#nom").val()
    if (!isNaN(bls) || !bls) {
        $("#nom").formError( "Your firstname");
        
    }else{
        $("#nom").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}

function prenomInput() {
    var bls = $("#prenom").val()
    if (!isNaN(bls) || !bls) {
        $("#prenom").formError( "Your lastname");
        
    }else{
        $("#prenom").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()

}

function adresseInput() {
    var bls = $("#adresse").val()
    if (!isNaN(bls) || !bls) {
        $("#adresse").formError( "Your adresse");
        
    }else{
        $("#adresse").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}

function villeInput() {
    var bls = $("#ville").val()
    if (!isNaN(bls) || !bls) {
        $("#ville").formError( "Your adresse");
        
    }else{
        $("#ville").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}

function code_postalInput() {
    var bls = $("#code_postal").val()
    var regl = /^[a-zA-Z0-9]{5,10}$/;
    
    if ((regl.test(bls.toString()) == false) ) {
        $("#code_postal").formError( "code postal doit faire entre 5 et 10 caracteres");
        
    }else{
        $("#code_postal").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}
function phoneInput() {
    var bls = $("#phone").val()
    var regl = /^[a-zA-Z0-9]{10,15}$/;
    // console.log(bls.toString().length);
    if ((regl.test(bls.toString()) == false) ) {
        $("#phone").formError( "Phone doit faire entre 5 et 10 caracteres");
        
    }else{
        $("#phone").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}
function mailInput() {
    var bls = $("#mail").val()
    if (!isNaN(bls) || !bls ) {
        $("#mail").formError( "Your email");
        
    }else{
        $("#mail").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}
function mdpInput() {
    var bls = $("#mdp").val()
    var regl = /^[a-zA-Z0-9]{8,}$/;

    if ((regl.test(bls.toString()) == false) ) {
        $("#mdp").formError( "le mot de passe doit faire au moins 8 caracteres");
        
    }else{
        $("#mdp").formError({
            remove:true,
            successImage: {enabled:false}
            });
    }
    changeInput()
}
// function nomInput() {

// }

