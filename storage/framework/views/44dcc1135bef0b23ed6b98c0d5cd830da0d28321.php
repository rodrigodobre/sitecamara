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
                        <b>Indicações</b>
                        <a class="float-right" href="<?php echo e(url('admin/indicacoes/novo')); ?>">
                            <span class="d-none d-sm-none d-md-inline-block d-lg-inline-block btn-outline-primary" style="padding: 2px 8px;border-radius:5px;">Nova Indicação</span>
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
                                <li class="d-lg-inline-block d-md-none d-sm-none d-none col-lg-1 col-md-1">Sessão</li>
                                <li class="d-inline-block col-5 col-sm-5 col-md-4 col-lg-4">Ações</li>
                            </ul>

                            <?php $__currentLoopData = $indicacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul class="d-block row align-items-center" style="border-bottom: 1px solid #ededed;padding-bottom: 12px;">
                                    <li class="d-lg-inline-block d-md-inline-block d-sm-block d-block col-lg-2 col-md-2 col-sm-12 col-12">
                                           
                                            <img src="<?php echo e(asset($indicacao->vereador->foto->foto_src)); ?>" style="max-width:800px;min-width:0;width: 100%;" />
                                    </li>
                                    <?php
                                    $titulo = $helpers->resumo($indicacao->titulo_ind,15);
                                    $texto = html_entity_decode($indicacao->texto_ind, ENT_QUOTES, 'UTF-8');
                                    $texto = strip_tags($texto);
                                    $texto_grande = $helpers->resumo($texto,100);
                                    $texto = $helpers->resumo($texto,15);

                                    ?>
                                    <li class="d-block d-sm-inline-block d-md-inline-block d-lg-inline-block col-12 col-sm-12 col-md-2 col-lg-2">
                                        <span class="d-none d-sm-none d-md-block d-lg-none"><?php echo e($titulo); ?></span>
                                        <span class="d-block d-sm-block d-md-none d-lg-block" style="padding-top: 10px;padding-bottom: 10px;text-align: justify;"><?php echo e($indicacao->titulo_ind); ?></span>
                                    </li>
                                    <li class="d-lg-inline-block d-md-inline-block d-sm-none d-none col-lg-2 col-md-3">
                                        <span class="d-none d-sm-none d-md-block d-lg-none"><?php echo e($texto); ?></span>
                                        <span class="d-block d-sm-block d-md-none d-lg-block" style="padding-top: 10px;padding-bottom: 10px;text-align: justify;"><?php echo e($texto_grande); ?></span>
                                    </li>
                                    <li class="d-lg-inline-block d-md-none d-sm-none d-none col-lg-1 col-md-1">
                                  <?php
                                        $dateEN = new \DateTime($indicacao->sessao);
                                        $datePTBR = $dateEN->format('d/m/Y');
                                    ?>
                                        <?php echo e($datePTBR); ?>

                                    </li>
                                    <li class="d-block d-sm-inline-block d-md-inline-block d-lg-inline-block col-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="indicacoes/<?php echo e($indicacao->id); ?>/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">
                                            <span class="d-lg-block d-md-none d-sm-none d-none">Editar</span>
                                            <img class="d-lg-none d-md-block d-sm-block d-block" src="<?php echo e(asset('public/img/editar.svg')); ?>" />
                                        </a>
                                        <?php echo e(Form::open(['method' =>'DELETE','url' => 'admin/indicacoes/'.$indicacao->id, 'style' => 'display:inline'])); ?>

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
<div class="container">
    <div class="row align-items-center mx-auto">
        <?php echo e($indicacoes->links()); ?>  
    </div>
</div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>