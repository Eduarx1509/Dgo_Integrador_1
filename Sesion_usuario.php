<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos_sesion.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link href="css/estilos_sesion.css" rel="stylesheet" type="text/css" />
  <title>Inicio de Sesión</title>

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/estilos_sesion.css">

  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <header>
    <div class="logo-container">
      <img src="img/logopill.svg" alt="">
    </div>
    <div class="buscar">
      <input type="text" placeholder="Buscar...">
      <button onclick="realizarBusqueda()" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
    </div>
    <nav>
      <ul>
        <li><a href="pag_Cliente.php" class="subrayado">Inicio</a></li>
        <li><a href="#" class="subrayado">Restaurantes</a></li>
        <li><a href="#" class="subrayado">Promociones</a></li>
        <li><a href="Sesion_usuario.php" class="subrayado" style="margin-right: 0;">Iniciar sesión</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form action="negocio3.php" method="post" class="sign-in-form">
            <div class="logo">
              <img src="imglogin/logopill.png" alt="">
            </div>
            <div class="heading">
              <h2>¡Bienvenido nuevamente!</h2>
              <h6>¿No estás registrado aún?</h6>
              <a href="#" class="toggle">Registrarse</a>
            </div>
            <div class="actual-form">
              <div class="input-wrap">
                <input type="email" class="input-field" name="correo" autocomplete="off" required />
                <label>Correo</label>
              </div>
              <div class="input-wrap">
                <input type="password" minlength="4" name="contrasena" class="input-field" autocomplete="off" required />
                <label>Contraseña</label>
              </div>
              <input type="submit" value="Iniciar sesión" id="" class="sign-btn" />
              <p class="text">
                <a href="iniciar_sesionRestaurante.php">Iniciar sesion</a> como restaurante
              </p>
            </div>
          </form>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="sign-up-form">
            <div class="logo">
              <img src="imglogin/logopill.png" alt="">
            </div>
            <div class="heading">
              <h2>¡Comencemos!</h2>
              <h6>Ya tengo una cuenta</h6>
              <a href="#" class="toggle">Iniciar sesión</a>
            </div>
            <div class="actual-form">
              <div style="display: flex;">
                <div class="input-wrap" style="width: 50%; margin-right: 10px;">
                  <input type="text" class="input-field" autocomplete="off" required name="nombre" value="<?php if (isset($nombre)) echo $nombre; ?>">
                  <label>Nombre</label>
                </div>
                <div class="input-wrap" style="width: 50%; margin-left: 10px;">
                  <input type="text" class="input-field" name="apellido" autocomplete="off" required />
                  <label>Apellidos</label>
                </div>
              </div>
              <div class="input-wrap">
                <input type="email" minlength="4" class="input-field" autocomplete="off" name="correo" required />
                <label>Correo</label>
              </div>
              <div class="input-wrap">
                <input type="tel" name="telefono" pattern="9\d{8}" title="Ingrese un número peruano válido de 9 dígitos" class="input-field" autocomplete="off" required />
                <label>Telefono</label>
              </div>
              <div class="input-wrap">
                <input type="password" name="contrasena" class="input-field" autocomplete="off" required />
                <label>Contraseña</label>
              </div>
              <input type="submit" name="submit" value="Registrarse" id="" class="sign-btn" />
            </div>
            <?php include 'negocio4.php'; ?>
          </form>

        </div>
        <div class="carousel">
          <div class="images-wrapper">
            <img src="imglogin/1.png" alt="" class="image img-1 show">
            <img src="imglogin/2.png" alt="" class="image img-2">
            <img src="imglogin/3.png" alt="" class="image img-3">
          </div>
          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Realiza tu pedido con D'Go!</h2>
                <h2>Un delivery que todos merecen</h2>
                <h2>Solicita un registro de tu restaurante</h2>
              </div>
            </div>
            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
  <script>
    const inputs = document.querySelectorAll(".input-field");
    const toggle_btn = document.querySelectorAll(".toggle");
    const main = document.querySelector("main");
    const bullets = document.querySelectorAll(".bullets span");
    const images = document.querySelectorAll(".image");

    inputs.forEach(inp => {
      inp.addEventListener("focus", () => {
        inp.classList.add("active");
      });
      inp.addEventListener("blur", () => {
        if (inp.value != "") return;
        inp.classList.remove("active");
      });
    });

    toggle_btn.forEach((btn) => {
      btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode")
      })
    });

    function moveSlider() {
      let index = this.dataset.value;

      let currentImage = document.querySelector(`.img-${index}`);
      images.forEach((img) => img.classList.remove("show"));
      currentImage.classList.add("show");

      const textSlider = document.querySelector(".text-group");
      textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

      bullets.forEach((bull) => bull.classList.remove("active"));
      this.classList.add("active");
    }

    bullets.forEach(bullet => {
      bullet.addEventListener("click", moveSlider);
    });
  </script>
</body>

</html>