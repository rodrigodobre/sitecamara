<?php $__env->startSection('content'); ?>
<?php
$mesa_diretora = null;
?>
    <div class="container">
        <div class="row align-items-center">
            <?php $__currentLoopData = $vereadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vereador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($vereador->ativo == true): ?>
                    <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($vereador->fk_foto == $foto->id): ?>
                            <div class="card" style="margin:auto;width: 320px;margin-bottom: 15px;">
                                <img class="card-img-top" src="<?php echo e(asset($foto->foto_src)); ?>" alt="<?php echo e($vereador->partido); ?>" width="320" height="240" />
                                <div class="card-body">
                                    <h6 class="card-title" style="font-size: medium;"><?php echo e($vereador->nome_parlamentar); ?></h6>
                                    <?php if($vereador->mesa_diretora == 1): ?>
                                        <?php $mesa_diretora = 'Presidente'; ?>
                                    <?php endif; ?>
                                    <?php if($vereador->mesa_diretora == 2): ?>
                                        <?php $mesa_diretora = '1º Vice Presidente'; ?>
                                    <?php endif; ?>
                                    <?php if($vereador->mesa_diretora == 3): ?>
                                        <?php $mesa_diretora = '2ª Vice Presidente'; ?>
                                    <?php endif; ?>
                                    <?php if($vereador->mesa_diretora == 4): ?>
                                        <?php $mesa_diretora = 'Secretária'; ?>
                                    <?php endif; ?>
                                    <?php if($vereador->mesa_diretora == 5): ?>
                                        <?php $mesa_diretora = 'Vice Secretário'; ?>
                                    <?php endif; ?>
                                    <h6 class="card-title" style="font-size: medium;"><?php echo e($mesa_diretora); ?></h6>
                                    <a href="vereadores/<?php echo e($vereador->id); ?>" class="btn btn-primary">Ver mais</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>