async function register() {
    var nome = document.getElementById('nome').value;
    var senha = document.getElementById('senha').value;


    if (nome && senha)  {
        var formData = new FormData();
        formData.append('nome', nome);
        formData.append('senha', senha);


        const response = await fetch('../php/register.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok){
            var dados = await response.text();  
            if (dados === "1"){
                alert("Usuario inserido!");
            }else {
                alert("Nome de Usuario já existe!")
            }
        }

    }
}