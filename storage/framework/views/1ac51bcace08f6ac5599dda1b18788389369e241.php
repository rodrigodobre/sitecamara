<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('America/Campo_Grande');

$usuarios = new Controllers\UsuariosController();
$usuarios_lista = DB::table('users')->get();
$alteracoes = DB::table('Alteracoes')->orderBy('updated_at', 'desc')->paginate(10);
$alteracao = null;
?>

<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Últimas alterações feitas no sistema</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                        <table class="table">
                            <th>Usuário</th>
                            <th>Alteração</th>
                            <th></th>
                            <th>Data</th>
                            <th>Hora</th>
                            <?php $__currentLoopData = $alteracoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alteracao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                        <tr>
                                            <td>
                                                <?php if($alteracao->fk_usuario == Auth::user()->id): ?>
                                                    Você
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $usuarios_lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($alteracao->fk_usuario == $usuario->id): ?>
                                                            <?php echo e($usuario->name); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($alteracao->operacao == 1): ?>
                                                    Adicionou um(a) novo(a)
                                                <?php endif; ?>
                                                <?php if($alteracao->operacao == 2): ?>
                                                    Alterou um(a)
                                                <?php endif; ?>
                                                <?php if($alteracao->operacao == 3): ?>
                                                    Excluíu um(a)
                                                <?php endif; ?>
                                                <?php if($alteracao->operacao == 4): ?>
                                                    Publicou um(a)
                                                <?php endif; ?>
                                                <?php if($alteracao->operacao == 5): ?>
                                                    Retirou um(a)
                                                <?php endif; ?>
                                                <?php if($alteracao->operacao == 6): ?>
                                                    Ativou um(a)
                                                <?php endif; ?>
                                                <?php if($alteracao->operacao == 7): ?>
                                                    Desativou um(a)
                                                <?php endif; ?>
                                                    <?php if($alteracao->tabela == 1): ?>
                                                        Notícia
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 2): ?>
                                                        Destaque
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 3): ?>
                                                        Indicação
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 4): ?>
                                                        Foto
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 5): ?>
                                                        Lei
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 6): ?>
                                                        Usuário
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 7): ?>
                                                        Carroussel
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 8): ?>
                                                        Galeria
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 9): ?>
                                                        Vereador(a)
                                                    <?php endif; ?>
                                                    <?php if($alteracao->tabela == 10): ?>
                                                        Resenha
                                                    <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($alteracao->operacao == 3): ?>
                                                    id: <?php echo e($alteracao->idtabelaalterada); ?>

                                                <?php else: ?>
                                                    <?php if($alteracao->tabela == 1): ?>
                                                        <a href="noticias/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                    <?php endif; ?>
                                                        <?php if($alteracao->tabela == 2): ?>
                                                            <a href="destaques/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 3): ?>
                                                            <a href="indicacoes/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 4): ?>
                                                            <a href="fotos/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 5): ?>
                                                            <a href="leis/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 6): ?>
                                                            <a href="usuarios/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 7): ?>
                                                            <a href="carroussels/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 8): ?>
                                                            <a href="galerias/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 9): ?>
                                                            <a href="vereadores/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                        <?php if($alteracao->tabela == 10): ?>
                                                            <a href="resenhas/<?php echo e($alteracao->idtabelaalterada); ?>/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($alteracao->updated_at != null): ?>
                                                    <?php echo e(date("d-m-Y", strtotime($alteracao->updated_at))); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($alteracao->updated_at != null): ?>
                                                    <?php echo e(date("H:i:s", strtotime($alteracao->updated_at))); ?>

                                                <?php endif; ?>
                                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php echo e($alteracoes->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>