document.addEventListener("DOMContentLoaded", function () {
    // Pega os dados do localStorage
    let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    
    // Pega o e-mail do usuário logado
    let emailLogado = localStorage.getItem("emailLogado");

    if (!emailLogado) {
        alert("Por favor, faça o login.");
        window.location.href = "login.html"; // Caso o usuário não tenha feito login, redireciona para a página de login
        return;
    }

    // Encontra o usuário logado
    let usuario = usuarios.find(user => user.email === emailLogado);

    if (usuario) {
        // Exibe as informações do usuário na página
        document.getElementById("nomeUsuario").innerText = usuario.nome;
        document.getElementById("perfilNome").innerText = usuario.nome;
        document.getElementById("perfilSobrenome").innerText = usuario.sobrenome;
        document.getElementById("perfilEmail").innerText = usuario.email;
    }

    // Lógica de logout
    document.getElementById("logoutBtn").addEventListener("click", function () {
        localStorage.removeItem("emailLogado"); // Remove o e-mail logado do localStorage
        alert("Você saiu com sucesso!");
        window.location.href = "login.html"; // Redireciona para a página de login
    });
});

