<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Vereadores</b>
                        <a class="float-right" href="<?php echo e(url('admin/vereadores/novo')); ?>">Novo Vereador</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nome Parlamentar</th>
                                    <th scope="col">Partido</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $vereadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vereador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($foto->id == $vereador->fk_foto): ?>
                                                <img src="<?php echo e(asset($foto->foto_src)); ?>" width="50" class="img-thumbnail"/></td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td><?php echo e($vereador->nome_parlamentar); ?></td>
                                    <td><?php echo e($vereador->partido); ?></td>
                                    <td><?php echo e($vereador->telefone); ?></td>
                                    <td>
                                        <?php if($vereador->ativo == true): ?>
                                            <?php echo e(Form::open(['method' =>'PATCH','url' => 'admin/vereadores/ativar/'.$vereador->id, 'style' => 'display:inline'])); ?>

                                            <button type="submit" class="btn btn-outline-danger">Desativar</button>
                                            <input type="hidden" name="ativo" value="0" />
                                            <?php echo e(Form::close()); ?>

                                        <?php else: ?>
                                            <?php echo e(Form::open(['method' =>'PATCH','url' => 'admin/vereadores/ativar/'.$vereador->id, 'style' => 'display:inline'])); ?>

                                            <button type="submit" class="btn btn-outline-success">Ativar</button>
                                            <input type="hidden" name="ativo" value="1" />
                                            <?php echo e(Form::close()); ?>

                                        <?php endif; ?>
                                        <a href="vereadores/<?php echo e($vereador->id); ?>/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        <?php echo e(Form::open(['method' =>'DELETE','url' => 'admin/vereadores/'.$vereador->id, 'style' => 'display:inline'])); ?>

                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        <?php echo e(Form::close()); ?>

                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php echo e($vereadores->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>