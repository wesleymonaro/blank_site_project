//função para envio de e-mail ao sumbeter form
$("#contato").submit(function (event) {
  $("#bt_enviar").prop("disabled", true);
  $("#bt_enviar").val("Enviando");
  $.ajax({
    url: "lib/sendMail.php",
    type: "POST",
    data: "Nome=" + $("#txtNome").val() +
      "&Telefone=" + $("#txtTelefone").val() +
      "&Email=" + $("#txtEmail").val() +
      "&Onde=" + $("#txtOnde").val() +
      "&Mensagem=" + $("#txtMensagem").val() +
      "&Origem=Sort",

    dataType: "html"

  }).done(function (resposta) {
    $("#contato").hide();
    $("#box_message").show();

  }).fail(function (jqXHR, textStatus) {
    console.log("Request failed: " + textStatus);
  }).always(function () {});
  event.preventDefault();
});


/*rolagem suave*/
jQuery(document).ready(function ($) {
  $(".scroll").click(function (event) {

    $('html,body').animate({
      scrollTop: $(this.hash).offset().top
    }, 800);
    event.preventDefault();
  });
});


/*máscara de telefone*/
$(document).ready(function () {
  $('#txtTelefone').mask(SPMaskBehavior, spOptions);
});
var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function (val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
  };