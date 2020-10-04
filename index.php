<?php
 include 'include/header.php';

if (isset($_SESSION['auth'])) {
  header('location:tablero/index.php');
  exit();
}

  ?>
<body>

    <section class="container">
        <div class="container-form ">
            <form onsubmit="return false" class="white form-login z-depth-1">
              <div class="input-field col s12 l6">
                <input type="text" name="nombre" id="nombre" class="validate">
                <label for="primer_nombre"> Nombre</label>
              </div>
              
              <div class="input-field col s12">
                <input type="email" name="email" id="email" class="validate">
                <label for="email" data-error="Correo Inválido" data-success="Correcto">Email</label>
              </div>
              <div class="input-field col s12 m6">
                    <select class="icons" name="avatar" id="avatar">
                      <option value="avatar-1.png" data-icon="images/avatar/avatar-1.png" class="left">avatar 1</option>
                      <option value="avatar-2.png" data-icon="images/avatar/avatar-2.png" class="left">avatar 2</option>
                      <option value="avatar-3.png" data-icon="images/avatar/avatar-3.png" class="left">avatar 3</option>
                      <option value="avatar-14.png" data-icon="images/avatar/avatar-14.png" class="left">avatar 4</option>
                      <option value="avatar-15.png" data-icon="images/avatar/avatar-15.png" class="left">avatar 5</option>
                      <option value="avatar-16.png" data-icon="images/avatar/avatar-16.png" class="left">avatar 6</option>
                    </select>
                    <label for="avatar">Seleccionar un avatar</label>
                  </div>
              
              <button class="btn waves-effect waves-light blue" id="btnSub" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
              </button>
            </form>
        </div>
    </section>
    
    <?php include 'include/footer.php'; ?>