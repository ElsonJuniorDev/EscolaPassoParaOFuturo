<?php
session_start(); // Inicia a sessão para verificar se o usuário está logado
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header  class = "containerHeader section_container"> 
    <div class="containerHeader">
      <a href="index.php">
        <div class = "containerLogo">
          <img src="src/img/LogoSimples.png" alt="Logo" class="Logo">
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
                 <a href="src/login.php" > <i class="ri-login-box-line"></i></i>Login</a>
                 <samp>|</samp>
                 <a href="src/cadastro.php"><i class="ri-user-add-line"></i>Criar conta</a>            
                <?php endif; ?>
            </ul>
        </div>
           <div class = "ContainerMenu">
              <i class="ri-menu-fill"></i>
           </div>
        </nav>   
    </div>     
</header>

<div class="bg-main-index" >
    <main class = "containerMainIndex section_container">
        <div class="containerCloudSup">
          <img src="src/img/inverted-cloud.png" alt="">
        </div>
         <div class = "ContainerMain">        
          <div class = "containerTexto">
           <h1>O passo certo para o seu futuro!</h1>
           <p>Matriculas abertas</p>
           <button class= "btn">Saiba mais</button>   
        </div>        
      </div>
      <div class = "containerCloudInf">
          <img src="src/img/cloud.png" alt="Imagem Principal" class="ImagemPrincipal">
        </div>
    </main>
  </div>
   

</body>
</html>
