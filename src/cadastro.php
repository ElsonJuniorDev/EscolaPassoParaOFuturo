<?php include '../db.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastre-se</title>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>"> 
</head>
<body>

<header  class = "containerHeader section_container"> 
    <div class="containerHeader">
      <a href="../index.php">
        <div class = "containerLogo">
          <img src="../src/img/LogoSimples.png" alt="Logo" class="Logo">
          <h2>ESCOLA</h2>
          <p>PASSOS PARA O FUTURO</p>
        </div>
      </a>
      
      <nav class = "ContainerNav">        
        <div class = "ContainerLoginCadastro">
            <ul>
                <?php if (isset($_SESSION['usuario'])): ?>
                 <p>Olá, <?php echo $_SESSION['usuario']['nome']; ?>!</p>
                 <a href="perfil.php">Acessar meu perfil</a>
                 <a href="logout.php">Sair</a>
                <?php else: ?>
                 <a href="login.php" > <i class="ri-login-box-line"></i></i>Login</a>
                             
                <?php endif; ?>
            </ul>
        </div>
           <div class = "ContainerMenu">
              <i class="ri-menu-fill"></i>
           </div>
        </nav>   
    </div>     
</header>


<div class="bg-main-cadastro">
    <main class=" section_container">      
        <div class="containerCloudSup">
            <img src="../src/img/inverted-cloud.png" alt="Nunvem invertida">
        </div>
        <div class="containerForm">
          <div class="container">
            <form action="processa_cadastro.php" method="POST" class = "formCadastro">
                <h1 class="formTitle">Cadastre-se</h1>            
                <div class="formGroup">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                </div>

                <div class="formGroup">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" id="sobrenome" required>
                </div>

                <div class="formGroup">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="formGroup">
                    <label for="senha">Senha</label>
                        <div class="password-container">
                            <input type="password" name="senha" id="senha" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('senha', this)"><i class="ri-lock-fill"></i></button>
                        </div>    
                </div>
            

                <div class="formGroup">
                    <label for="confirmar_senha">Confirmar Senha</label>
                        <div class="password-container">
                            <input type="password" name="confirmar_senha" id="confirmar_senha" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('confirmar_senha', this)"><i class="ri-lock-fill"></i></button>
                        </div>
                </div>       
                 <button type="submit" class="btn">Cadastrar</button>
                 <p>Já tem uma conta? - <a href="../src/login.php">Faça login</a></p>
                 
            </form>
        </div>
        </div>
    </main>
</div>
<script src="../src/js/form.js"></script>
<script src="../src/js/cadastro.js"></script>
</body>
</html>
