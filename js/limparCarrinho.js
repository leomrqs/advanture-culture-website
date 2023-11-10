async function limparCarrinho() {
    const formData = new FormData();

    const response = await fetch("../php/limparCarrinho.php", {
        method: "POST",
        body: formData
    });
    location.reload();
}
