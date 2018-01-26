$(document).ready(function() {
    OpenPay.setId('mzi3n9jplzsfvk30dqlb');
    OpenPay.setApiKey('pk_991ffb3972c64b91ad85ffe5e6c4a04e');
    OpenPay.setSandboxMode(true);
    //Se genera el id de dispositivo
    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
    
    $('#pay-button').on('click', function(event) {
        event.preventDefault();
        $("#pay-button").prop( "disabled", true);
        OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);                
    });

    var sucess_callbak = function(response) {
      var token_id = response.data.id;
      $('#token_id').val(token_id);
      alert(token_id);
      $('#payment-form').submit();
    };

    var error_callbak = function(response) {
        var desc = response.data.description != undefined ? response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
    };

});
