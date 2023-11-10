async function addToCart(id) {

    var idProduto = new FormData();
    idProduto.append('idProduto', id);
    
    // Realize uma solicitação Fetch para enviar os dados ao servidor.
    const response = await fetch("../php/addToCart.php", {
        method: "POST",
        body: idProduto
    })

    if (response.ok) {
        const resposta = await response.text();
        alert(resposta);
    }
}