// Função para enviar formulário de resenha e exibir uma mensagem de sucesso
const formResenha = document.querySelector("form");

if (formResenha) {
    formResenha.addEventListener("submit", function(event) {
        event.preventDefault(); // Previne o envio real do formulário
        alert("Sua resenha foi enviada com sucesso!");
        formResenha.reset(); // Reseta os campos do formulário após o envio
    });
}

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
