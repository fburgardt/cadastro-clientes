function consultarCep(cep) {
  $.get("http://viacep.com.br/ws/" + cep + "/json/ ", {
  },
    function (result, status) {
      // console.log(status);
      // console.log(result);
      $("#endereco").val(result.logradouro);
      $("#bairro").val(result.bairro);
      $("#cidade").val(result.localidade);
      $("#estado").val(result.uf);
    });
}
