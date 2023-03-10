<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Prueba Empleados</title>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <link href="<?php echo e(asset('css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/bootstrap-icons.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/fontawesome.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/solid.css')); ?>" rel="stylesheet"> 
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="background-color: #344D67;" >
                <div class="container-fluid" >
                    <a class="navbar-brand text-white" href="#">EMPLEADOS</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <div class="container-fluid card-header">
                    <div class="row justify-content-md-center">
                        
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-building"></i> Nueva Compa??ia
                                </button>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#positionModal">
                                    <i class="fa-solid fa-people-arrows"></i> Nuevo Departamento&nbsp;&nbsp;
                                </button>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#userModal">
                                    <i class="fa-solid fa-user-plus"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nuevo Usuario&nbsp;&nbsp;&nbsp;&nbsp;
                                </button>
                            </div>
                        
                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-lg-center">
                            <div class="col-lg-auto">
                                <div class="card saldos">
                                    <div class="card-body">
                                        <div class="row" id="content">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nueva Compa??ia</h5>
                          
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Nombre:</label>
                              <input type="text" class="form-control" id="name_company" >
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" onclick="save_company()">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="modal fade" id="positionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nueva Departamento</h5>
                          
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Nombre:</label>
                              <input type="text" class="form-control" id="name_position" >
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" onclick="save_position()">Guardar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nueva Usuario</h5>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="name_employee" required >
                                    <input type="text" class="form-control" id="id_employee" hidden>
                                    
                                  </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="first_name" required>
                                  </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="last_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Fecha de Ingreso:</label>
                                    <input type="date" class="form-control" id="start_date" required>
                                  </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Empresa:</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="company" name="company" required>
                                        <option value="" disabled selected >Seleccione</option>
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($company->id); ?>"  ><?php echo e($company->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Puesto:</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="position" name="position" required>
                                        <option value="" disabled selected >Seleccione</option>
                                        <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($position->id); ?>"  ><?php echo e($position->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                           
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" onclick="save_employee()" id="btn_guardar">Guardar</button>
                          <button type="button" class="btn btn-primary" onclick="update_employee()" id="btn_modificar" hidden>Modificar</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </main>

        </div>
    </body>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script src="<?php echo e(asset('js/Libs/jquery-3.5.1.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Libs/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Libs/dataTables.bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Libs/sweetalert2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Libs/employees.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\wamp64\www\EmpleadosPrueba\resources\views/welcome.blade.php ENDPATH**/ ?>