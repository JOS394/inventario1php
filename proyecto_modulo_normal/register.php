

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
      <div class="wrap-login100 ">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="imagenes/register.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" id="registro" name="registro">
            <input type="text" hidden="" id="levelusuario" name="levelusuario" value="2" >
          <span class="login100-form-title">
            Registro de Usuario
          </span>
<div class="row">
    <div class="col-md-8">
                 <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario"      >
            <span class="focus-input100"></span>
            <span class="symbol-input100">
             <i class="fas fa-user" aria-hidden="true"></i>
            </span>
            </div>
    </div>
    <div class="col-md">
    </div>
  </div>
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" id="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

            <div class="wrap-input100 validate-input"  >
            <input class="input100" type="text" name="nombres" id="nombres" placeholder="Nombre Completo">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fas fa-file-signature"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="telefono" id="telefono" placeholder="telefono">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
             <i class="fas fa-phone-square-alt"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password requerida">
            <input class="input100" type="password" name="password" id="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>


          <div class="wrap-input100 validate-input" data-validate = "Password requerida">
            <input class="input100" type="password" name="repassword" id="repassword" placeholder="Repeat Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-unlock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <span type="button" class="btn btn-primary btn-lg btn-block mb-4 login100-form-btn" id="Registrar" name="Registrar" >Registrar</span>
              
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
                ¿Ya tienes cuenta?
            </span>
            <a class="txt2" href="login.php">
              Acceder
            </a>
          </div>

          
        </form>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function(){
        $('#Registrar').click(function(){
            datos=$('#registro').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"register/agregarusuario.php",
                success:function(r){
                    if(r==1){
                       

        let timerInterval
        Swal.fire({
          title: 'Registrando',
          text: "por favor espere un momento!",
          timer: 1200,
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


Swal.fire({
  title: 'Te has registrado con exito!',
  text: "Quieres ir a loguearte en la pagina?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Loguearme!'
}).then((result) => {
  if (result.value) {
    window.location="login.php";

  }else{
Swal.fire(
  'Registrado con Exito!',
  '',
  'success'
)
  }
})

            console.log('I was closed by the timer')
                   }
        })

                        $('#registro')[0].reset();
                        
                    }else{
                 
          Swal.fire({
          position: 'top-center',
          type: 'error',
          title: 'Fallo de registrar <br>vuelve a intentarlo',

          showConfirmButton: false,
          timer: 1300
        })
                    }
                }
            });
        })});

</script>

<?php 
    include_once "includes/footer.php";
 ?>