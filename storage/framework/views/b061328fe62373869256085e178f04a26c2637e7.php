<?php
    use App\Http\Controllers\Helpers;
    $ajuda = new Helpers();
?>

<?php $__env->startSection('content'); ?>
    <div class="centro">
        <div class="relacao"><br />
            <?php $__currentLoopData = $indicacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($indicacao->vereador->ativo == true): ?>
                        <?php
                            $texto_sem_tags = strip_tags($indicacao->texto_ind);
                            $resumo = $ajuda->resumo(($texto_sem_tags), 100);
                        ?>
                        <a href="indicacoes/<?php echo e($indicacao->id); ?>">
                            <ul>
                                <li><img alt="foto" src="<?php echo e(asset($indicacao->vereador->foto->foto_src)); ?>" width="80"/></li>
                                <li><?php echo e(date("d-m-Y", strtotime($indicacao->sessao))); ?></li>
                                <li><p><?php echo e($indicacao->titulo_ind); ?></p>
                                    <p style="font-size: 0.9em;"><?= $resumo ?></p>
                                </li>
                            </ul>
                        </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br />
        </div>
        <div class="pagination" style="margin-left: 40%;">
            <?php echo e($indicacoes->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>