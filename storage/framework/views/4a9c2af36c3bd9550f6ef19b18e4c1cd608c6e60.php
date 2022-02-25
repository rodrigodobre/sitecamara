<?php
$helpers = new \App\Http\Controllers\Helpers();
?>

<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Consultas</b>
                    </div>

                    <div class="card-body">
                        
                        <table class="table">
                           
                            <th>Bairro</th>
                            <th>Sugestão</th>
                            <th>Verificar</th>
                            <?php $__currentLoopData = $consultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr>
                                    <td><?php echo e($consulta->bairro); ?></td>
                                    <?php $sugestao = $helpers->resumo($consulta->sugestao, 100); ?>
                                    <td><?php echo e($consulta->sugestao); ?></td>
                                    <td>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($consulta->id); ?>">
                                        Verificar
                                      </button>
                                    <div class="modal" tabindex="-1" role="dialog" id="exampleModal<?php echo e($consulta->id); ?>">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title"><?php echo e($consulta->bairro); ?></h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p><?php echo e($consulta->sugestao); ?></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php echo e($consultas->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>