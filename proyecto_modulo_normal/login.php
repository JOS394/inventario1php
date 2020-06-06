

<?php 
    include_once "includes/header.php";
 ?>
<link href="librerias/bootstrap4/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="librerias/login.css" rel="stylesheet" id="bootstrap-css">
<script src="librerias/bootstrap4/js/bootstrap.min.js"></script>
<script src="librerias/sweetAlert/js/sweetalert2.all.js"></script>
<script src="librerias/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="librerias/sweetAlert/css/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="librerias/sweetAlert/css/sweetalert2.min.css">
<!------ Include the above in your HEAD tag ---------->

<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="imagenes/img-01.webp" alt="IMG">
        </div>

        <form class="login100-form validate-form">
          <span class="login100-form-title">
            Login de Usuario
          </span>
  
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" id="usuario" placeholder="Email o Usuario">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" id="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <span class="btn btn-primary btn-lg btn-block mb-4 login100-form-btn" id="entrarSistema" name="entrarSistema" >Entrar</span>
              
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Has olvidado
            </span>
            <a class="txt2" href="#">
              Usuario / Password?
            </a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="#">
              Crear un nuevo usuario
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
<script type="text/javascript">

  $(document).ready(function(){
    $('#entrarSistema').click(function(){
      if (($('#usuario').val()=="") && ($('#password').val()=="")){
Swal.fire({
  position: 'top-center',
  type: 'error',
  title: 'No se permiten campos vacios',
  showConfirmButton: false,
  timer: 1400
})
        return false;
      }else if ($('#usuario').val()=="") {
          Swal.fire({
          position: 'top-center',
          type: 'error',
          title: 'Debes Ingresar Usuario',
          showConfirmButton: false,
          timer: 1400
        })
        return false;
      }else if($('#password').val()==""){
          Swal.fire({
          position: 'top-center',
          type: 'error',
          title: 'Debes Ingresar contraseña',
          showConfirmButton: false,
          timer: 1400
        })
        return false;
      }
      cadena="usuario=" + $('#usuario').val() + "&password=" + $('#password').val();

      $.ajax({
        type:"POST",
        url: "login/login.php",
        data:cadena,
        success:function(r){
        if (r==1) {
          

        let timerInterval
        Swal.fire({
          title: 'Iniciando Sesion',
          timer: 2000,
          popup: 'animated bounced',
          onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              Swal.getContent().querySelector('b')
                .textContent = Swal.getTimerLeft()
            }, 100)
          },
          onClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.timer
          ) {
            console.log('I was closed by the timer')
          window.location="index.php";
          }
        })

        }else{

          Swal.fire({
          position: 'top-center',
          type: 'error',
          title: 'Fallo de sesion<br>vuelve a intentarlo',

          showConfirmButton: false,
          timer: 1300
        })

        }
      }

      })
    });
  });
</script>
<?php 
    include_once "includes/footer.php";
 ?>