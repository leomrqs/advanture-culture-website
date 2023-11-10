window.onload = async function () {
    async function criador(){
    var resultado = await fetch("../php/php.php", {
        method : "GET"
    });

    var dados = await resultado.json();

    for(var i = 0; i < dados.length; i++){
        var conteudo = `<div class="card" data-category="${dados[i].categoria}">
        <div class="card-icone"><img class="card-img" src="${dados[i].imagem}"></div>
        <div class="card-titulo">${dados[i].nome}</div>
        <div class="card-price"> R$${dados[i].preco}</div>
        <div class="card-botao">
            <button type="button" onclick="addToCart(${dados[i].id})" >Adicionar ao Carrinho</button>
        </div>
        </div>`;
        document.getElementById('produto').innerHTML += conteudo;
    }

    // correção do bug da barra de pesquisa // espera carregar todos produtos pra puxar
    document.getElementById('searchInput').addEventListener('keyup', filterProducts);
    document.getElementById('categorySelect').addEventListener('change', filterProducts);
};

async function mostrador(){
    var result = await fetch("../php/mostrador.php",{
    method: "GET"
    }); 
    var dados = await result.text(); 
    console.log(dados);
    if (dados){
        document.getElementById('nome').innerHTML = dados;
    }   
}
mostrador();
criador();

function filterProducts() {
    const filter = document.getElementById('searchInput').value.toUpperCase();
    const category = document.getElementById('categorySelect').value;
    const cards = document.querySelectorAll('.card');
  
    cards.forEach(card => {
        const title = card.querySelector('.card-titulo').textContent || card.querySelector('.card-titulo').innerText;
        const cardCategory = card.getAttribute('data-category'); // Supondo que cada card tenha um atributo 'data-category'

        if (title.toUpperCase().indexOf(filter) > -1 && (category === "all" || cardCategory === category)) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    });
}

document.getElementById('button-scroll').addEventListener('click', function(event) {
    // Previne o comportamento padrão do link
    event.preventDefault();
    // Obtém o elemento 
    const elementoParaRolar = document.getElementById('produto');
    // Faz a rolagem até o elemento
    elementoParaRolar.scrollIntoView({ behavior: 'smooth' });
  });

}

document.addEventListener("DOMContentLoaded", function() {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');

    searchIcon.addEventListener('click', function() {
        searchBar.classList.toggle('show');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const iconNav = document.querySelector('.icon-nav');
    let select; // Variável para armazenar o elemento select

    // Função para criar o elemento select
    function createSelect() {
        select = document.createElement('select');
        select.id = 'iconSelect';
        select.innerHTML = `
            <option value="index.html"> Menu </option>
            <option value="carrinho.html">Carrinho</option>
            <option value="login.html">Login</option>
            <option value="index.html">Home</option>
        `;
        select.addEventListener('change', function() {
            window.location.href = this.value;
        });
        iconNav.parentNode.insertBefore(select, iconNav.nextSibling); // Insere o select depois de iconNav
    }

    // Função para alternar entre ícones e select baseado na largura da tela
    function toggleIcons() {
        const width = window.innerWidth;

        // Verifica se está na página index.html
        const isIndexPage = window.location.pathname.endsWith('index.html') || window.location.pathname === '/';

        // Se não estiver na página index.html
        if (!isIndexPage) return;

        if (width <= 630 && !document.querySelector('#iconSelect')) {
            iconNav.style.display = 'none'; // Esconde os ícones
            createSelect(); // Cria o select
        } else if (width > 630 && select) {
            iconNav.style.display = 'flex'; // Mostra os ícones
            select.remove(); // Remove o select
        }
    }

    // Verifica a largura da tela inicialmente e adiciona um ouvinte de evento para mudanças de tamanho
    toggleIcons();
    window.addEventListener('resize', toggleIcons);
});


/*
var dados = [
    { nome: "Roupa", price: '129.00', icone: 'img/1.jpg'},
    { nome: "Camisa", price: '239.00', icone: 'img/2.jpg'},
    { nome: "Polo", price: '432.00', icone: 'img/4.jpg'}
];

for(var i = 0; i < dados.length; i++){

    var conteudo = `<div class="card">
    <div class="card-icone"><img class="card-img" src="${dados[i].icone}"></div>
    <div class="card-titulo">${dados[i].nome}</div>
    <div class="card-price"> R$${dados[i].price}</div>
    <div class="card-botao">
        <button>Adicionar ao Carrinho</button>
    </div>
    </div>`;
    document.getElementById('produto').innerHTML += conteudo;

}

*/