<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row align-items-top">
        <div class="col-sm-12 col-md-6 col-lg-6 d-inline-block">
            <img src="<?php echo e(asset($foto)); ?>" class="d-inline-block" style="max-width: 640px;min-width: 320px;width: 100%;margin-bottom: 15px;vertical-align: top;" />
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 d-inline-block" style="margin-left: auto;vertical-align: top;text-align: left;">
            <h4><?php echo e($vereador->nome_parlamentar); ?></h4><br /><br />
            <h6>
                <p>Nome Completo:&nbsp;<?php echo e($vereador->nome); ?></p>
                <p>Partido:&nbsp;<?php echo e($vereador->partido); ?></p>
                <p>Telefone:&nbsp;<?php echo e($vereador->telefone); ?></p>
                <p>Email:&nbsp;<?php echo e($vereador->email); ?></p>
                <p>Naturalidade:&nbsp;<?php echo e($vereador->naturalidade); ?></p>
                <p>Data de nascimento:&nbsp;<?php echo e($vereador->data_nasc); ?></p>
                <p>Profissão:&nbsp;<?php echo e($vereador->profissao); ?></p>
                <p>
                    <?php if($vereador->mesa_diretora == 0): ?>
                        Não Pertence a Mesa Diretora
                    <?php endif; ?>
                    <?php if($vereador->mesa_diretora == 1): ?>
                            Mesa Diretora: Presidente
                    <?php endif; ?>
                    <?php if($vereador->mesa_diretora == 2): ?>
                            Mesa Diretora: Vice Presidente
                    <?php endif; ?>
                    <?php if($vereador->mesa_diretora == 3): ?>
                            Mesa Diretora: Segundo Vice Presidente
                    <?php endif; ?>
                    <?php if($vereador->mesa_diretora == 4): ?>
                            Mesa Diretora: Secretário
                    <?php endif; ?>
                    <?php if($vereador->mesa_diretora == 5): ?>
                            Mesa Diretora: Segundo Secretário
                    <?php endif; ?>

                </p>
            </h6><br />
            <input class="btn btn-primary" type="button" value="Voltar" onClick="history.go(-1)">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>