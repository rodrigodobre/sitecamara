<?php
$helpers = new \App\Http\Controllers\Helpers();
?>

<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Usuários</b>
                        <?php if(Route::has('register')): ?>
                                <a class="float-right" href="<?php echo e(route('register')); ?>">Novo Usuário</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                        <table class="table">
                            <th></th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Permissão</th>
                            <th>Ações</th>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr>
                                    <td>
                                        <img src="{ asset($usuario->foto->fk_foto) }}" width="50" class="img-thumbnail"/></td>
                                    <td><?php echo e($usuario->name); ?></td>
                                    <td><?php echo e($usuario->email); ?> </td>
                                    <td><?php echo e($usuario->permissao); ?></td>
                                    <td>
                                        <a href="usuarios/<?php echo e($usuario->id); ?>/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        <?php echo e(Form::open(['method' =>'DELETE','url' => 'admin/usuarios/'.$usuario->id, 'style' => 'display:inline'])); ?>

                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                        <?php echo e(Form::close()); ?>

                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>