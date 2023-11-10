document.addEventListener('DOMContentLoaded', function() {
    var paymentMethods = document.getElementsByName('paymentMethod');
    var qrCodeContainer = document.getElementById('qrCodeContainer');
    var qrCodeImage = document.getElementById('qrCodeImage');

    function toggleQRCode() {
        // Verifica se a opção PIX foi selecionada
        var pixSelected = document.getElementById('pix').checked;
        // Mostra ou esconde o QR code com base na seleção
        qrCodeImage.style.display = pixSelected ? 'block' : 'none';
    }

    // Adiciona o evento de 'change' para cada método de pagamento
    paymentMethods.forEach(function(method) {
        method.addEventListener('change', toggleQRCode);
    });
});