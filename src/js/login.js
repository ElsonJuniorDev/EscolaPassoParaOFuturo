document.addEventListener("DOMContentLoaded", function () {
  let loginForm = document.getElementById("loginForm");

  async function hashSenha(senha) {
    const encoder = new TextEncoder();
    const data = encoder.encode(senha);
    const hashBuffer = await crypto.subtle.digest("SHA-256", data);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map((byte) => byte.toString(16).padStart(2, "0")).join("");
  }

  async function verificarLogin(email, senhaDigitada) {
    let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    let senhaCriptografada = await hashSenha(senhaDigitada);

    let usuarioEncontrado = usuarios.find(
      (user) => user.email === email && user.senha === senhaCriptografada
    );

    if (usuarioEncontrado) {
      // Armazenar e-mail do usuário logado
      localStorage.setItem("emailLogado", email);

      alert("Login bem-sucedido!");
      window.location.href = "perfil.html"; // Redireciona para a página de perfil
    } else {
      alert("E-mail ou senha incorretos.");
    }
  }

  loginForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;

    await verificarLogin(email, senha);
  });
});
