async function updateToAdmin() {
    // Obtendo o valor do campo de entrada de username
    const username = document.getElementById("username").value;

    // Criando um objeto FormData para armazenar o username
    const formData = new FormData();
    formData.append('username', username);

    // Fazendo a chamada de API para o arquivo PHP
    const response = await fetch('../php/atualizaAdmin.php', {
        method: 'POST',
        body: formData
    });

    // Verificando se a requisição foi bem-sucedida
   var result = await response.text();
   alert(result);

}

