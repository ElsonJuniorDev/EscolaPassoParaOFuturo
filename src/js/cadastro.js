document.addEventListener("DOMContentLoaded", function () {
  let form = document.getElementById("cadastro");
  let botaoEnviar = document.getElementById("enviar");

  let validacoes = {
    nome: false,
    sobrenome: false,
    email: false,
    senha: false,
    confirmarSenha: false,
  };

  function setupInputValidation(
    inputId,
    labelId,
    minLength,
    customValidator = null
  ) {
    let input = document.getElementById(inputId);
    let label = document.getElementById(labelId);
    let originalText = label.innerHTML;

    input.addEventListener("keyup", () => {
      if (customValidator) {
        validacoes[inputId] = customValidator(input, label, originalText);
      } else {
        validacoes[inputId] = verificarTamanho(
          input,
          label,
          originalText,
          minLength
        );
      }
    });
  }

  function verificarTamanho(input, label, originalText, minLength) {
    if (input.value.length < minLength) {
      label.style.color = "red";
      label.innerHTML = `${originalText} - Mínimo de ${minLength} caracteres`;
      return false;
    } else {
      label.style.color = "#41affd";
      label.innerHTML = originalText;
      return true;
    }
  }

  function validarEmail(input, label, originalText) {
    let email = input.value;
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regex.test(email)) {
      label.style.color = "red";
      label.innerHTML = `${originalText} - E-mail inválido`;
      return false;
    } else {
      label.style.color = "#41affd";
      label.innerHTML = originalText;
      return true;
    }
  }

  function validarSenha(input, label, originalText) {
    let senha = input.value;
    let erros = [];

    if (senha.length < 8) erros.push("Mínimo 8 caracteres");
    if (!/[A-Z]/.test(senha)) erros.push("1 letra maiúscula");
    if (!/[0-9]/.test(senha)) erros.push("1 número");
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(senha))
      erros.push("1 caractere especial");

    if (erros.length > 0) {
      label.style.color = "red";
      label.innerHTML = `${originalText} - ${erros.join(", ")}`;
      return false;
    } else {
      label.style.color = "#41affd";
      label.innerHTML = originalText;
      return true;
    }
  }

  function validarConfirmacaoSenha() {
    let senha = document.getElementById("senha").value;
    let confirmarSenha = document.getElementById("confirmar-senha").value;
    let label = document.getElementById("labelconfirmarSenha");

    if (confirmarSenha !== senha || confirmarSenha.length === 0) {
      label.style.color = "red";
      label.innerHTML = "Confirmar Senha - Senhas não coincidem";
      validacoes.confirmarSenha = false;
    } else {
      label.style.color = "#41affd";
      label.innerHTML = "Confirmar Senha";
      validacoes.confirmarSenha = true;
    }
  }

  async function hashSenha(senha) {
    const encoder = new TextEncoder();
    const data = encoder.encode(senha);
    const hashBuffer = await crypto.subtle.digest("SHA-256", data);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map((byte) => byte.toString(16).padStart(2, "0")).join("");
  }

  async function salvarUsuario() {
    let nome = document.getElementById("nome").value;
    let sobrenome = document.getElementById("sobrenome").value;
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;

    let senhaCriptografada = await hashSenha(senha);

    let usuario = {
      nome,
      sobrenome,
      email,
      senha: senhaCriptografada, // Agora a senha está segura!
    };

    let usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
    usuarios.push(usuario);
    localStorage.setItem("usuarios", JSON.stringify(usuarios));

    alert("Cadastro realizado com sucesso!");
    form.reset();
  }

  botaoEnviar.addEventListener("click", async function (event) {
    event.preventDefault();

    if (
      validacoes.nome &&
      validacoes.sobrenome &&
      validacoes.email &&
      validacoes.senha &&
      validacoes.confirmarSenha
    ) {
      await salvarUsuario();
    } else {
      alert("Preencha todos os campos corretamente antes de enviar!");
    }
  });

  setupInputValidation("nome", "labelNome", 3);
  setupInputValidation("sobrenome", "labelSobrenome", 5);
  setupInputValidation("email", "labelEmail", 5, validarEmail);
  setupInputValidation("senha", "labelsenha", 8, validarSenha);

  let confirmarSenhaInput = document.getElementById("confirmar-senha");
  confirmarSenhaInput.addEventListener("keyup", validarConfirmacaoSenha);
});
