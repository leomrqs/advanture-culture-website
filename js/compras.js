window.onload = async function () {
    async function primeiraFuncao() {
        var resultado = await fetch("../php/compras.php", {
            method: "GET"
        });

        var dados = await resultado.json();

        for (var i = 0; i < dados.length; i++) {
            var conteudo = `<div class="cart-item">
            <div class="cart-titulo">${dados[i].nome}</div>
            <div class="cart-price">R$${dados[i].preco}</div>
            <div class="quantity-control">
            </div>
            </div>`;
            document.getElementById('comprasInseridas').innerHTML += conteudo;
        }

    }

    async function segundaFuncao() {
        var resultado = await fetch("../php/totalCompras.php", {
            method: "GET"
        });
    
        if (resultado.ok) { // Verifique se a resposta foi bem-sucedida
            var totalCompras = await resultado.json();
           

            console.log(totalCompras);
            console.log(totalCompras.totalPago);

            if (totalCompras) {
                document.getElementById('totalCompras').innerHTML = `
                    <p>Total pago nas compras:</p>
                    <div class="mostrador">${totalCompras.totalPago}</div>
                `;
            } else {
                document.getElementById('totalCompras').innerHTML = `<p>Você ainda não comprou nada!</p>`;
            }
        } else {
            console.log("Erro ao buscar o total de compras.");
        }
    }

    primeiraFuncao();
    segundaFuncao();
};