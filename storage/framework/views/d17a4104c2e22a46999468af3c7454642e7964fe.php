<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        INDICAÇÕES
                        <a class="float-right" href="<?php echo e(url('admin/indicacoes')); ?>">Lista de indicações</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                            <?php if(Request::is('*/editar')): ?>
                                <?php echo e(Form::model($indicacao, ['method' => 'PATCH','url' => 'admin/indicacoes/'.$indicacao->id, 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['url' => 'admin/indicacoes/salvar', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <div class="panel-body">
                                <?php
                                if(isset($foto)){
                                ?>
                                <img src="<?php echo e(asset($foto)); ?>" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                   $texto = $indicacao->texto_ind;
                                   $sessao = date("d-m-Y", strtotime($indicacao->sessao));
                                }
                                else{
                                    $texto = "";
                                    $sessao = null;
                                }
                                ?>
                                <?php echo e(Form::label('titulo_ind','Título')); ?>

                                <?php echo e(Form::input('text','titulo_ind',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Título'])); ?><br />
                                <?php echo e(Form::label('texto_ind','Texto')); ?><br />
                                <?php echo e(Form::textarea('texto_ind',$texto, null, ['class' => 'form-control', 'autofocus', 'placeholder' => '', 'id' => 'texto'])); ?>

                                <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'texto_ind' );
                                        CKEDITOR.editorConfig = function( config ) {
                                            config.language = 'pt-br';
                                            config.uiColor = '#F7B42C';
                                            config.height = 300;
                                            config.toolbarCanCollapse = true;
                                            config.extraPlugins = 'htmlwriter';
                                        };
                                </script>
                                <br />
                                <?php echo e(Form::label('sessao','Data da Sessão')); ?>

                                <?php echo e(Form::text('sessao', $sessao, ['class' => 'form-control', 'id'=>'datepicker'])); ?>

                                <?php echo e(Form::label('fk_vereador', 'Defina a qual vereador pertence a indicação')); ?>

                                <select name="fk_vereador" class="form-control">
                                        <?php if(isset($indicacao)): ?>
                                            <?php $__currentLoopData = $vereadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vereador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($vereador->ativo == true): ?>
                                                   <?php if($indicacao->fk_vereador == $vereador->id): ?>
                                                    <option value="<?php echo e($indicacao->fk_vereador); ?>" selected><?php echo e($vereador->nome_parlamentar); ?></option>
                                                   <?php else: ?>
                                                    <option value="<?php echo e($vereador->id); ?>"><?php echo e($vereador->nome); ?></option>
                                                   <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $vereadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vereador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($vereador->ativo == true): ?>
                                                    <option value="<?php echo e($vereador->id); ?>"><?php echo e($vereador->nome_parlamentar); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </select><br />
                                <?php echo e(Form::submit('Salvar',['class' => 'btn btn-primary'])); ?>

                                <?php echo e(Form::close()); ?>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>