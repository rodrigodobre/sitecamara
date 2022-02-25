<?php
$helpers = new \App\Http\Controllers\Helpers();
setlocale(LC_ALL, "pt_BR.utf8");
?>

<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card-header">
                        <b>Destaques</b>
                        <a class="float-right" href="<?php echo e(url('admin/destaques/novo')); ?>">
                            <span class="d-none d-sm-none d-md-inline-block d-lg-inline-block btn-outline-primary" style="padding: 2px 8px;border-radius:5px;">Novo Destaque</span>
                            <span class="d-block d-sm-block d-md-none d-none btn-outline-primary" style="padding: 2px 8px;border-radius:3px;">+</span>
                        </a>
                    </div>

                    <div class="container col-12">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                            <ul class="d-block row align-items-center" style="border-bottom: 2px solid lightgrey;padding-bottom: 12px;padding-top: 12px;">
                                <li class="d-lg-inline-block d-md-inline-block d-sm-block d-block col-lg-2 col-md-2 col-sm-12 col-12">Imagem</li>
                                <li class="d-inline-block col-5 col-sm-5 col-md-2 col-lg-2">Título</li>
                                <li class="d-lg-inline-block d-md-inline-block d-sm-none d-none col-lg-2 col-md-3">Texto</li>
                                <li class="d-lg-inline-block d-md-none d-sm-none d-none col-lg-1 col-md-1">Data</li>
                                <li class="d-inline-block col-5 col-sm-5 col-md-4 col-lg-4">Ações</li>
                            </ul>

                            <?php $__currentLoopData = $destaques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destaque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul class="d-block row align-items-center" style="border-bottom: 1px solid #ededed;padding-bottom: 12px;">
                                    <li class="d-lg-inline-block d-md-inline-block d-sm-block d-block col-lg-2 col-md-2 col-sm-12 col-12">
                                            <?php
                                                $name = str_replace('../img/', 'img/', $destaque->foto->foto_src);
                                            ?>
                                            <img src="<?php echo e(asset($name)); ?>" style="max-width:800px;min-width:0;width: 100%;" />
                                    </li>
                                    <?php
                                    $titulo = $helpers->resumo($destaque->titulo,15);
                                    $texto = html_entity_decode($destaque->texto, ENT_QUOTES, 'UTF-8');
                                    $texto = strip_tags($texto);
                                    $texto_grande = $helpers->resumo($texto,100);
                                    $texto = $helpers->resumo($texto,15);

                                    ?>
                                    <li class="d-block d-sm-inline-block d-md-inline-block d-lg-inline-block col-12 col-sm-12 col-md-2 col-lg-2">
                                        <span class="d-none d-sm-none d-md-block d-lg-none"><?php echo e($titulo); ?></span>
                                        <span class="d-block d-sm-block d-md-none d-lg-block" style="padding-top: 10px;padding-bottom: 10px;text-align: justify;"><?php echo e($destaque->titulo); ?></span>
                                    </li>
                                    <li class="d-lg-inline-block d-md-inline-block d-sm-none d-none col-lg-2 col-md-3">
                                        <span class="d-none d-sm-none d-md-block d-lg-none"><?php echo e($texto); ?></span>
                                        <span class="d-block d-sm-block d-md-none d-lg-block" style="padding-top: 10px;padding-bottom: 10px;text-align: justify;"><?php echo e($texto_grande); ?></span>
                                    </li>
                                    <li class="d-lg-inline-block d-md-none d-sm-none d-none col-lg-1 col-md-1">
                                    <?php
                                        $dateEN = new \DateTime($destaque->data_n);
                                        $datePTBR = $dateEN->format('d/m/Y');
                                    ?>
                                        <?php echo e($datePTBR); ?>

                                    </li>
                                    <li class="d-block d-sm-inline-block d-md-inline-block d-lg-inline-block col-12 col-sm-12 col-md-4 col-lg-4">
                                        <?php if($destaque->publicado == true): ?>
                                            <?php echo e(Form::open(['method' =>'PATCH','url' => 'admin/destaques/publicar/'.$destaque->id, 'style' => 'display:inline'])); ?>

                                            <button type="submit" class="btn btn-outline-danger">
                                                <span class="d-lg-block d-md-none d-sm-none d-none">Retirar</span>
                                                <img class="d-lg-none d-md-block d-sm-block d-block" src="<?php echo e(asset('public/img/retirar.svg')); ?>" />
                                            </button>
                                            <input type="hidden" name="publicado" value="0" />
                                            <?php echo e(Form::close()); ?>

                                        <?php else: ?>
                                            <?php echo e(Form::open(['method' =>'PATCH','url' => 'admin/destaques/publicar/'.$destaque->id, 'style' => 'display:inline'])); ?>

                                            <button type="submit" class="btn btn-outline-success">
                                                <span class="d-lg-block d-md-none d-sm-none d-none">Publicar</span>
                                                <img class="d-lg-none d-md-block d-sm-block d-block" src="<?php echo e(asset('public/img/publicar.svg')); ?>" />
                                            </button>
                                            <input type="hidden" name="publicado" value="1" />
                                            <?php echo e(Form::close()); ?>

                                        <?php endif; ?>
                                        <a href="destaques/<?php echo e($destaque->id); ?>/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">
                                            <span class="d-lg-block d-md-none d-sm-none d-none">Editar</span>
                                            <img class="d-lg-none d-md-block d-sm-block d-block" src="<?php echo e(asset('public/img/editar.svg')); ?>" />
                                        </a>
                                        <?php echo e(Form::open(['method' =>'DELETE','url' => 'admin/destaques/'.$destaque->id, 'style' => 'display:inline'])); ?>

                                        <button type="submit" class="btn btn-danger">
                                            <span class="d-lg-block d-md-none d-sm-none d-none">Excluir</span>
                                            <img class="d-lg-none d-md-block d-sm-block d-block" src="<?php echo e(asset('public/img/excluir.svg')); ?>" />
                                        </button>
                                        <?php echo e(Form::close()); ?>

                                    </li>
                                </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>