// Função para enviar formulário de resenha e exibir uma mensagem de sucesso
const formResenha = document.querySelector("form");

// Função para adicionar interatividade nas ofertas (mudança de cor ao passar o mouse)
const ofertasItens = document.querySelectorAll("#ofertas .book-item");

ofertasItens.forEach(item => {
    item.addEventListener("mouseenter", function() {
        item.style.backgroundColor = "#6b9ce4";
    });

    item.addEventListener("mouseleave", function() {
        item.style.backgroundColor = "#fff";
    });
});
