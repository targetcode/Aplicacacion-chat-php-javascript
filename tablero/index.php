<?php
 include '../include/header.php'; 

 if (!isset($_SESSION['auth'])) {
  header('location:../');
  exit();
}


 ?>
<body>
    <nav class="darken-3 blue">
      <div class="nav-wrapper">
        <div class="container">
          <a href="#" class="brand-logo">LOGO</a>
          <ul class="right ">
            <li><a href="#">Hola <span><?php echo $_SESSION['nombre']; ?></span></a></li>
            <li><a href="salir.php" class="waves-efect btn darken-3 red">&times;</a></li>
          </ul>
         
        </div>
      </div>
    </nav>

    <section class="container">
        <div class="card white card-pt max-height-card">
          <nav class="pl-1 darken-3 blue">
              <a href="#" class="brand-logo">
                  <img src=../images/avatar/<?php echo $_SESSION['avatar']; ?> width="40">
              </a>
          </nav>
          <div class="card-content dark-text" id="mensagges_all">
            

          </div>

          <div class="card-input">
            <div class="row">
              <form onsubmit="return false" id="formchat">
                <div class="input-field col s10">
                  <input type="text"  id="mensaje">
                  <label for="menssage">Mensaje</label>
                </div>
                <input type="hidden" id="userid" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" id="nombre_user" value="<?php echo $_SESSION['nombre']; ?>">
                <input type="hidden" id="avatar_user" value="<?php echo $_SESSION['avatar']; ?>">
                <input type="hidden" id="fecha" value="<?php echo date('d-m-Y'); ?>">
                <div class="input-field  col s2">
                    <button type="submit" class="btn waves-effect waves-light blue" id="enviarMensaje">
                        <i class="material-icons right">send</i>
                      </button>
                </div>
                
              </form>
            </div>
          </div>
          
        </div>
        
    </section>
    
<?php include '../include/footer.php'; ?>