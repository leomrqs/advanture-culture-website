window.onload = async function () {
    
    async function primeiraFuncao() {
        var resultado = await fetch("../php/carrinho.php", {
            method: "GET"
        });

        var dados = await resultado.json();

        for (var i = 0; i < dados.length; i++) {
            var conteudo = `<div class="cart-item">
            <img class="cart-img" src="${dados[i].imagem}">
            <div class="cart-titulo">${dados[i].nome}</div>
            <div class="cart-price">R$${dados[i].preco}</div>
            <div class="quantity-control">
                <button type="button" onclick="excluirDoCarrinho(${dados[i].id})">Remover</button>
            </div>
            </div>`;
            document.getElementById('carrinhoInserido').innerHTML += conteudo;
        }

        // correção do bug da barra de pesquisa // espera carregar todos produtos pra puxar
        //document.getElementById('searchInput').addEventListener('keyup', filterProducts);
        //document.getElementById('categorySelect').addEventListener('change', filterProducts);
    }

    async function segundaFuncao() {
        var resultado = await fetch("../php/totalCompra.php", {
            method: "GET"
        });

        var totalCompra = await resultado.json();
        var numero = totalCompra.totalPago;
    
        if (numero){
            document.getElementById('total').innerHTML = `
            <div class="mostrador"> R$
            ${numero}
            </div>
            `   
        } else {
            document.getElementById('total').innerHTML = `<p>R$ 00.00 </p>`
        }


        console.log(numero);  
    }

    primeiraFuncao();
    segundaFuncao();
};