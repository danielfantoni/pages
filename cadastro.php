<?php
require_once 'conn.php';



$sucesso = false;
/* $arquivo = $_FILES['imagem']; */


if ($_SERVER['REQUEST_METHOD'] === 'POST') {




  $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
  $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
  $filtro = filter_input(INPUT_POST, 'filtro', FILTER_SANITIZE_SPECIAL_CHARS);
  $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_SPECIAL_CHARS);

  try {



    // 3. Insere o novo usuário utilizando Prepared Statements
    $sql_inserir = "INSERT INTO portifolio (titulo, descricao, filtro, img) VALUES (:titulo, :descricao, :filtro, :img)";
    $stmt_inserir = $pdo->prepare($sql_inserir);
    $stmt_inserir->bindParam(':titulo', $titulo);
    $stmt_inserir->bindParam(':descricao', $descricao);
    $stmt_inserir->bindParam(':filtro', $filtro);
    $stmt_inserir->bindParam(':img', $img);

    $stmt_inserir->execute();
    
  } catch (PDOException $e) {
    $mensagem = "Erro no banco de dados: " . $e->getMessage();
  }
  header('Location: index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Daniel Fantoni</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/fonts/style.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>


  <main class="main">
    <div class="container">
      <div class="row">
      <div class="col-12 col-md-6">
        <form id="formAuthentication" method="POST" action="cadastro.php" class="mb-6" enctype="multipart/form-data">
      <div class="mb-6">
        <label for="titulo" class="form-label">Titulo</label>
        <input
          type="text"
          class="form-control"
          id="titulo"
          name="titulo"
          placeholder=""
          autofocus />
        <!-- <span id="msg_nome"></span> -->
      </div>
      <div class="mb-6">
        <label for="descricao" class="form-label">Descricao</label>
        <input
          type="text"
          class="form-control"
          id="descricao"
          name="descricao"
          placeholder=""
          autofocus />
        <!-- <span id="msg_nome"></span> -->
      </div>
      <div class="mb-6">
        <label for="filtro" class="form-label">Filtro</label>
        <input
          type="text"
          class="form-control"
          id="filtro"
          name="filtro"
          placeholder=""
          autofocus />
        <!-- <span id="msg_nome"></span> -->
      </div>
      <div class="mb-6">
        <label for="img" class="form-label">Imagem</label>
        <input
          type="text"
          class="form-control"
          id="img"
          name="img"
          placeholder=""
          autofocus />
        <!-- <span id="msg_nome"></span> -->
      </div>
      <!-- <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="senha"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
                <span id="msg_password"></span>
              </div> -->
      <!-- <div class="mb-6">
                
                <label for="inputImage" class="form-label">Imagem</label>
                <div class="input-group input-group-merge">
                  <input
                    id="inputImage"
                    type="file"
                    name="imagem"
                    accept="image/*"
                    class="form-control"
                    aria-label=""
                    required />
                  <span class="input-group-text cursor-pointer"><i id="ico-clear-input" class="icon-base bx bx-x d-none"></i></span>
                </div>
              </div> -->
      <!-- <div class="mb-8">
                  <div class="d-flex justify-content-between">
                    <div class="form-check mb-0">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                    <a href="auth-forgot-password-basic.html">
                      <span>Forgot Password?</span>
                    </a>
                  </div>
                </div> -->
      <div class="mt-3 mb-6">
        <button id="btn-salvar-user" class="btn btn-primary d-grid " form="formAuthentication" type="submit">Salvar</button>
      </div>
    </form>
      </div>
    </div>
    </div>

  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container">
      <div class="social-links d-flex justify-content-center">
        <a href="https://www.instagram.com/_fantonidaniel/#" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/daniel-fantoni-7220991b0/" target="_blank"><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright </span><span>&copy; </span><span id="mostrarAnoAtual"> </span> <strong class="px-1 sitename">Tbyte Soluções Digitais</strong> <!-- <span>All Rights Reserved</span> -->
        </div>
        <div class="credits">
          <!--  -->
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Preloader -->

</body>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/typed.js/typed.umd.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</html>