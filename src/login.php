<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seja Bem Vindo</title>
    <link rel="stylesheet" href="css/cadastro-login.css" />
  </head>
  <body>
    <header><img class="logo" src="img/Logo.png" alt="Logo" /></header>
    <form id="loginForm" class="formLogin">
      <h1 class="formTitle">Login</h1>
      <div class="formGroup">
        <label for="email" id="labelEmail">E-mail</label>
        <input type="email" name="email" id="email" />
      </div>
      <div class="formGroup">
        <label for="senha" id="labelsenha">Senha</label>
        <input type="password" name="senha" id="senha" />
      </div>

      <button type="submit" class="btnEntrar" id="btnLogin">Entrar</button>


      <p>Ainda não tem uma conta? <a href="/src/cadastro.html">Clique aqui</a></p>
    </form>
  </body>
    <script src="js/login.js"></script>
</html>
