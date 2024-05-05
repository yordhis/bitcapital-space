<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BitCapital Space</title>
  <!-- BOOSTRAP CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
  <!-- Toastify CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <link rel="stylesheet" href="./main.css">
  <style>
     .wt {
    position: fixed;
    right: 0px;
    bottom: 0px;
    display: inline;
    text-align: end
  }

  .wt-icon svg {
    fill: #46c154;
    width: 80px
  }

  .popup {
    position: relative;
    background-color: #fff;
    color: #2eb242;
    padding: 5px 15px 5px 15px;
    border-radius: 40px;
    right: 10px;
    transition: 1s;
    bottom: -10px;
    opacity: 0;
    box-shadow: 0px 0px 5px #2eb242
  }

  .wt:hover .popup {
    display: block;
    bottom: 0px;
    opacity: 1
  }
  </style>
</head>

<body>

  <pre style="background-color: #fff; position: absolute;">
 <?php include 'php/conexion.php'; 
   var_dump($conexion);
    if($conexion){
         echo 'Conectado a la base de datos';
     }else{
         echo 'Base de datos no conectada';
     }
 ?>
 </pre>
 <!-- Inicio de espacio  -->  
 <div class="space">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav gradient-text ms-auto">
          <a class="nav-link logged-out" href="#" data-bs-toggle="modal" data-bs-target="#signinModal">Login</a>
          <a class="nav-link logged-out" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Register</a>
        </div>
      </div>
    </div>
  </nav>
  
 
  
  <!-- Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h3>Registro</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
    <!-- Inicio de formulario de Registro -->
          <form action="php/register_user.php" method="POST">

            <label for="fullname">Nombre completo</label>
            <input type="text" class="form-control mb-3" placeholder="Nombre completo" name="nombre_completo" required>

            <label for="dni">Document ID</label>
            <input type="number" class="form-control mb-3" placeholder="Documento de Identidad" name="dni_document" required>

            <label for="numberphone">Numero de telefono</label>
            <input type="tel" class="form-control mb-3" placeholder="Nunmero de telefono" name="numero_telefono" required>

            <label for="email">Correo electronico:</label>
            <input type="text" class="form-control mb-3" placeholder="Correo electronico" name="correo" required>

            <label for="password">Contraseña:</label>
            <input type="password" class="form-control mb-3" placeholder="Contraseña" name="contrasena" required>

            <button class="btn btn-primary">Registrarte</button>
          </form>
    <!-- Fin de formulario de registro -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade color-inicio" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignin"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h3>Login</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    <!-- Inicio de formulario de login -->
          <form action="php/login_user.php" method="POST" class="form__login">
            <label for="email">Correo electronico</label>
            <input type="text" class="form-control mb-3" placeholder="Correo electronico" name="correo" required>
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control mb-3" placeholder="Password" name="contrasena" required>

            <button class="btn btn-success w-100 mb-4">Iniciar Sesion</button>
    <!-- Fin de formulario de login -->
            
        </form>
      </div>
    </div>
  </div>
  </div>

<!-- Space-Home -->

<section class="home">
    <div class="description">
      <h1 class="title">
        <span class="gradient-text">BitCapital</span>Space
      </h1>
      <p class="paragraph">
        In a world filled with opportunities, having a mentor can make all the
        difference. Explore why people turn to this invaluable resource to
        unlock their potential.
      </p>
      
    </div>
  </section>

  <div class="ship">
    <div class="ship-rotate">
      <div class="pod"></div>
      <div class="fuselage"></div>
    </div>
  </div>
  <div class="ship-shadow"></div>
  <div class="mars">
    <div class="tentacle"></div>
    <div class="flag">
      <div class="small-tentacle"></div>
    </div>
    <div class="planet">
      <div class="surface"></div>
      <div class="crater1"></div>
      <div class="crater2"></div>
      <div class="crater3"></div>
    </div>
  </div>
  <div class="test"></div>
</div>
<!-- End Space-Home -->
<!-- Inicio boton whatsapp -->

<div class="wt">
  <div class="popup">
    <p>Buen dia, hablemos por Whatsapp</p>
  </div>
  <div class="wt-icon">
    <a target="_blank" href="https://wa.me/+593964094558"><svg viewBox="0 0 46.4 45.9">

        <g>
          <path d="M-13.9-13.7A19.1,19.1,0,0,1,0-19.4a19.1,19.1,0,0,1,14,5.7A18.6,18.6,0,0,1,19.7,0a18.6,18.6,0,0,1-5.8,13.7A19.1,19.1,0,0,1,0,19.4a19.1,19.1,0,0,1-13.9-5.7A18.6,18.6,0,0,1-19.7,0,18.6,18.6,0,0,1-13.9-13.7ZM13.4-2a12.9,12.9,0,0,0-3.8-8.2,12.9,12.9,0,0,0-8.3-3.7H-0.2A12.7,12.7,0,0,0-8.6-10a12.7,12.7,0,0,0-3.7,8.7,13.1,13.1,0,0,0,1.5,6,1.9,1.9,0,0,1,.2.8,2.3,2.3,0,0,1-.1.8l-2.1,6V12.1h0.1L-9.1,11l3.5-1.1A13.7,13.7,0,0,0,.6,11.5H1A12.7,12.7,0,0,0,7.3,9.7,12.7,12.7,0,0,0,13.4-.4V-2ZM4.9,8.6a10.7,10.7,0,0,1-4.4.9H-0.6A11.9,11.9,0,0,1-5.3,7.7L-9.4,9l1-2.9,0.4-1L-8.8,4A10.3,10.3,0,0,1-10.1-.1a11.3,11.3,0,0,1-.1-1.3A10.1,10.1,0,0,1-5.6-9.9,10,10,0,0,1-.2-11.8H0.6A10.3,10.3,0,0,1,8.8-8.1a10,10,0,0,1,2.6,6.7A11.2,11.2,0,0,1,11,1.8,10.5,10.5,0,0,1,4.9,8.6ZM5.6,0.9L4,0.3H4a2.3,2.3,0,0,0-.8.8,2.2,2.2,0,0,1-.8.8h0A4.2,4.2,0,0,1,.8,1.3,8.2,8.2,0,0,1-1.5-.8a3.9,3.9,0,0,1-.8-1.4L-1.8-3a1.5,1.5,0,0,0,.5-0.9L-2-5.4a5.4,5.4,0,0,0-.8-1.4H-4Q-5.6-6.5-5.6-4A6.8,6.8,0,0,0-4.1-.4,12.2,12.2,0,0,0,.4,3.7,12.1,12.1,0,0,0,3.7,4.8H4a3.8,3.8,0,0,0,1.7-.4A2.4,2.4,0,0,0,7.1,2.1a1.8,1.8,0,0,0,0-.4Z" transform="translate(23.2 22.9)" fill="#46c154" />
          <path d="M-13.9-13.7A19.1,19.1,0,0,1,0-19.4a19.1,19.1,0,0,1,14,5.7A18.6,18.6,0,0,1,19.7,0a18.6,18.6,0,0,1-5.8,13.7A19.1,19.1,0,0,1,0,19.4a19.1,19.1,0,0,1-13.9-5.7A18.6,18.6,0,0,1-19.7,0,18.6,18.6,0,0,1-13.9-13.7ZM13.4-2a12.9,12.9,0,0,0-3.8-8.2,12.9,12.9,0,0,0-8.3-3.7H-0.2A12.7,12.7,0,0,0-8.6-10a12.7,12.7,0,0,0-3.7,8.7,13.1,13.1,0,0,0,1.5,6,1.9,1.9,0,0,1,.2.8,2.3,2.3,0,0,1-.1.8l-2.1,6V12.1h0.1L-9.1,11l3.5-1.1A13.7,13.7,0,0,0,.6,11.5H1A12.7,12.7,0,0,0,7.3,9.7,12.7,12.7,0,0,0,13.4-.4V-2ZM4.9,8.6a10.7,10.7,0,0,1-4.4.9H-0.6A11.9,11.9,0,0,1-5.3,7.7L-9.4,9l1-2.9,0.4-1L-8.8,4A10.3,10.3,0,0,1-10.1-.1a11.3,11.3,0,0,1-.1-1.3A10.1,10.1,0,0,1-5.6-9.9,10,10,0,0,1-.2-11.8H0.6A10.3,10.3,0,0,1,8.8-8.1a10,10,0,0,1,2.6,6.7A11.2,11.2,0,0,1,11,1.8,10.5,10.5,0,0,1,4.9,8.6ZM5.6,0.9L4,0.3H4a2.3,2.3,0,0,0-.8.8,2.2,2.2,0,0,1-.8.8h0A4.2,4.2,0,0,1,.8,1.3,8.2,8.2,0,0,1-1.5-.8a3.9,3.9,0,0,1-.8-1.4L-1.8-3a1.5,1.5,0,0,0,.5-0.9L-2-5.4a5.4,5.4,0,0,0-.8-1.4H-4Q-5.6-6.5-5.6-4A6.8,6.8,0,0,0-4.1-.4,12.2,12.2,0,0,0,.4,3.7,12.1,12.1,0,0,0,3.7,4.8H4a3.8,3.8,0,0,0,1.7-.4A2.4,2.4,0,0,0,7.1,2.1a1.8,1.8,0,0,0,0-.4Z" transform="translate(23.2 22.9)" fill="none" stroke="#fff" stroke-width="7" />
          <path d="M-13.9-13.7A19.1,19.1,0,0,1,0-19.4a19.1,19.1,0,0,1,14,5.7A18.6,18.6,0,0,1,19.7,0a18.6,18.6,0,0,1-5.8,13.7A19.1,19.1,0,0,1,0,19.4a19.1,19.1,0,0,1-13.9-5.7A18.6,18.6,0,0,1-19.7,0,18.6,18.6,0,0,1-13.9-13.7ZM13.4-2a12.9,12.9,0,0,0-3.8-8.2,12.9,12.9,0,0,0-8.3-3.7H-0.2A12.7,12.7,0,0,0-8.6-10a12.7,12.7,0,0,0-3.7,8.7,13.1,13.1,0,0,0,1.5,6,1.9,1.9,0,0,1,.2.8,2.3,2.3,0,0,1-.1.8l-2.1,6V12.1h0.1L-9.1,11l3.5-1.1A13.7,13.7,0,0,0,.6,11.5H1A12.7,12.7,0,0,0,7.3,9.7,12.7,12.7,0,0,0,13.4-.4V-2ZM4.9,8.6a10.7,10.7,0,0,1-4.4.9H-0.6A11.9,11.9,0,0,1-5.3,7.7L-9.4,9l1-2.9,0.4-1L-8.8,4A10.3,10.3,0,0,1-10.1-.1a11.3,11.3,0,0,1-.1-1.3A10.1,10.1,0,0,1-5.6-9.9,10,10,0,0,1-.2-11.8H0.6A10.3,10.3,0,0,1,8.8-8.1a10,10,0,0,1,2.6,6.7A11.2,11.2,0,0,1,11,1.8,10.5,10.5,0,0,1,4.9,8.6ZM5.6,0.9L4,0.3H4a2.3,2.3,0,0,0-.8.8,2.2,2.2,0,0,1-.8.8h0A4.2,4.2,0,0,1,.8,1.3,8.2,8.2,0,0,1-1.5-.8a3.9,3.9,0,0,1-.8-1.4L-1.8-3a1.5,1.5,0,0,0,.5-0.9L-2-5.4a5.4,5.4,0,0,0-.8-1.4H-4Q-5.6-6.5-5.6-4A6.8,6.8,0,0,0-4.1-.4,12.2,12.2,0,0,0,.4,3.7,12.1,12.1,0,0,0,3.7,4.8H4a3.8,3.8,0,0,0,1.7-.4A2.4,2.4,0,0,0,7.1,2.1a1.8,1.8,0,0,0,0-.4Z" transform="translate(23.2 22.9)" />
        </g>
      </svg>

    </a>
  </div>
</div>
<!-- fin boton whatsapp -->

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Toastify js -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="./main.js" type="module"></script>

</body>

</html>