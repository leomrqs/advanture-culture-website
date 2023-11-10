function confirmarPedido() {
    alert('Compra finalizada com sucesso!');
}

async function finalizarCompra(event) {

    event.preventDefault(); // Previne o comportamento padrão de envio do formulário.

    var form = document.getElementById('checkoutfinalizarForm');

    // Verifica se o formulário é válido antes de enviar
    if (form.checkValidity()) {
        var dados = new FormData(form);
        const response = await fetch('../php/finalizarCompra.php', {
            method: 'POST',
            body: dados 
        });

        confirmarPedido();
    } else {
        form.reportValidity(); // Isso exibirá as mensagens de validação HTML5.
    }
}

function toggleCardDetails() {
    // Verificar qual método de pagamento está selecionado
    const isCreditCard = document.getElementById('creditCard').checked;
    const isDebitCard = document.getElementById('debitCard').checked;
    
    // Selecionar o container dos detalhes do cartão
    const cardDetails = document.getElementById('cardDetails');
    
    // Mostrar ou ocultar baseado na seleção do usuário e ajustar o atributo 'required'
    const cardInputs = cardDetails.querySelectorAll('input');
    cardInputs.forEach(input => {
        if (isCreditCard || isDebitCard) {
            input.required = true;
        } else {
            input.required = false;
        }
    });

    cardDetails.style.display = isCreditCard || isDebitCard ? 'block' : 'none';
}

// Adicionando event listeners para os botões de rádio
document.getElementById('creditCard').addEventListener('change', toggleCardDetails);
document.getElementById('debitCard').addEventListener('change', toggleCardDetails);
document.getElementById('pix').addEventListener('change', toggleCardDetails);

// Adiciona event listener para o formulário de envio
document.getElementById('checkoutfinalizarForm').addEventListener('submit', finalizarCompra);

// Certifique-se de chamar a função no carregamento da página para definir o estado inicial
document.addEventListener('DOMContentLoaded', toggleCardDetails);
