async function buscarDados() {
    const formData = new FormData();
    const nome = document.getElementById("nome").value;
    const senha = document.getElementById("senha").value;
    formData.append('nome', nome);
    formData.append('senha', senha);

    const response = await fetch('../php/login.php', {
        method: 'POST',
        body: formData
    });

    if (response.ok) { // Verifica se a resposta foi bem-sucedida
        const data = await response.json();
        if (data.length > 0){
            
            var id = data[0].id;
            var permissao = data[0].permissao;  

            if (permissao == 'admin') {
                window.location.href = "administrator.html";
    
            }   else if(permissao == "user") {
                    
                window.location.href = "index.html";
            } 
        } else {
            alert("Login e/ou senha invalidos")
        }   

        //console.log(data);    
        
        console.log();

       // console.log(permissao);
          
    } 
}

document.getElementById('registerBtn').addEventListener('click', function() {
    // Redireciona para register.html
    window.location.href = 'register.html';
});