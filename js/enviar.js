async function mandarDados() {

    var imagemProduto = document.getElementById('imagemProduto');
    var file = imagemProduto.files[0];
    var fileType = file.type;
    console.log(fileType);

    if (fileType === 'image/png') {
        var nomeProduto = document.getElementById('nomeProduto').value;
        var precoProduto = document.getElementById('precoProduto').value; 
        var imagemProduto = document.getElementById('imagemProduto').files[0];
        var categoriaProduto = document.getElementById('categoriaProduto').value;

            // Arquivo é do tipo PNG, pode prosseguir com o upload ou outra ação
        if (nomeProduto && precoProduto && imagemProduto && categoriaProduto) {
            var formData = new FormData();
            formData.append('arquivo', imagemProduto);
            formData.append('nomeProduto', nomeProduto);
            formData.append('precoProduto', precoProduto);
            formData.append('categoriaProduto', categoriaProduto);

            const response = await fetch('../php/upload.php', {
            method: 'POST',
            body: formData
            });

        if (response.ok) {
                    alert('Dados enviados com sucesso.');
                }
        }
        } else {
            // Arquivo não é do tipo PNG, exibir alerta
            alert('O arquivo selecionado não é um PNG.');

        }

}