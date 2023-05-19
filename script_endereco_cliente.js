<script>
// Faz uma requisição AJAX para a página PHP que salva o endereço
$.ajax({}
    url: "armazena_endereco_cliente.php",
    type: "GET",
    success: function(response) {
        console.log("Endereço salvo com sucesso.")};
    error: function(jqXHR, textStatus, errorThrown) {
        console.log("Erro ao salvar endereço: " + textStatus)};

);
</script>















