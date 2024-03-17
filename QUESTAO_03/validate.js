$(document).ready(function () {
  //mascara
  $("#telefone").mask("(00)0 0000-0000");
});

function successMessage() {
  $(document).on("submit", "form", function () {
    var successMessage = $(".success-message");
    if (successMessage.length > 0) {
      // exibe a mensagem de sucesso
      alert(successMessage.text());

      // oculta a mensagem de sucesso após 3 segundos
      setTimeout(function () {
        successMessage.hide();
        location.reload();
      }, 3000);
    }
  });
}

function errorMessage() {
  $(document).on("submit", "form", function () {
    var errorMessage = $(".error-message");
    if (errorMessage.length > 0) {
      // exibe a mensagem de erro
      alert(errorMessage.text());

      // oculta a mensagem de erro após 3 segundos
      setTimeout(function () {
        errorMessage.hide();
      }, 3000);
    }
  });
}
