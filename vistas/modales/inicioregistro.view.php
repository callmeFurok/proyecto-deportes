<form class=" col-12 d-flex flex-column align-items-center justify-content-center padding__realizado__registro"
      method="post" name="ingresoFormulario" id="ingresoFormulario">

    <div class="form-inicial">

        <div class="forminicio">

            <br>

            <img src="images/empleados.png">


            <div class="input-container ic1">

                <input class="input text__errores textoletra" type="text" name="username" id="username" required/>

                <label class="letramovible">Usuario</label>

            </div>

            <div class="input-container ic2">

                <input class="input text__errores textoletra" type="password" name="password" id="password" required/>

                <label class="letramovible">Contraseña</label>

            </div>

            <div class="row align-items-center">

                <div class="col">

                    <button type="submit" class="btn btn-primary" name="ingresarUsuario" id="ingresarUsuario"
                            style="float:right; margin-top:2em;"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Ingresar
                    </button>

                </div>

            </div>

            <div class="input-container ic2">

                <p class="">

                    <a class="link" data-toggle="modal" data-target="#modalPregunta"
                       style="color: #4b4e53!important;"><i class="fas fa-user-tie"></i>&nbsp;No tengo cuenta</a>

                </p>

                <p class="" style="position: relative; top:-1em;">

                    <a class="link" data-toggle="modal" data-target="#modalRegistro"
                       style="color: #4b4e53!important;"><i class="fas fa-key"></i>&nbsp;Recuperar contraseña</a>

                </p>

            </div>

            <br>
            <br>

            <div class="row">

                <div class="col col-12 text-center letra__inicial">

                    <a class="link" data-toggle="modal" data-target="#modalIncentivo" style="color: #4b4e53!important;">¿Qué
                        es el incentivo tributario?</a>

                </div>

            </div>


        </div>

    </div>

    <?php

    require_once CONTROLADOR . CONTROLADOR3 . 'plantilla.general.controlador.php';

    require_once CONTROLADOR . CONTROLADOR2 . 'ingreso.controlador.php';

    $ingreso = new ingreso();

    $ingreso->ingresoCtr();

    ?>

</form>

