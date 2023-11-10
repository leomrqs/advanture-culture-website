
async function deleter(){
   
    var Teste = new FormData();
    var nomeProduto= document.getElementById('nomeExcluirProduto').value;
    Teste.append('nomeProduto', nomeProduto);

    const response = await fetch('../php/delete.php', {
        method: 'POST',
        body: Teste
    });
    if (response.ok) {
        const resposta = await response.text();
        alert(resposta);
    }   


}