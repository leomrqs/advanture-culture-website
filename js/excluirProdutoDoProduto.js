async function excluirDoCarrinho(id) {
    var idProduto = new FormData();
    idProduto.append('idProduto', id);

    // Realize uma solicitação Fetch para enviar os dados ao servidor.
    const response = await fetch("../php/excluirDoCarrinho.php", {
        method: "POST",
        body: idProduto
    })

    if (response.ok) {
        alert("Produto excluído do carrinho com sucesso!");
    } else {
        alert("Erro ao excluir o produto do carrinho.");
    }

    location.reload();
}

