<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $categories = [' ','Presidente','Vice-Presidente','Segundo Vice-Presidente','Secretário','Segundo Secretário']?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações dos Vereadores Abaixo
                        <a class="float-right" href="<?php echo e(url('admin/vereadores')); ?>">Listagem Vereador</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(Request::is('*/editar')): ?>
                                <?php echo e(Form::model($vereador, ['method' => 'PATCH','url' => 'admin/vereadores/'.$vereador->id, 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                                <?php echo e(Form::open(['url' => 'admin/vereadores/salvar', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <div class="panel-body">
                                <?php
                                    if(isset($foto)){
                                ?>
                                    <img src="<?php echo e(asset($foto)); ?>" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                    }
                                ?>
                                <?php echo e(Form::label('nome','Nome Completo')); ?>

                                <?php echo e(Form::input('text','nome',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome Completo'])); ?>

                                <?php echo e(Form::label('nome_parlamentar','Nome Parlamentar')); ?>

                                <?php echo e(Form::input('text','nome_parlamentar',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome Parlamentar'])); ?>

                                <?php echo e(Form::label('partido','Partido')); ?>

                                <?php echo e(Form::input('text','partido',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Partido'])); ?>

                                <?php echo e(Form::label('telefone','Telefone')); ?>

                                <?php echo e(Form::input('text','telefone',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '( )    -    '])); ?>

                                <?php echo e(Form::label('email','Email')); ?>

                                <?php echo e(Form::email('email',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '      @camarapontapora.ms.gov.br'])); ?>

                                <?php echo e(Form::label('naturalidade','Naturalidade')); ?>

                                <?php echo e(Form::input('text','naturalidade',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'brasileiro'])); ?>

                                <?php echo e(Form::label('data_nasc','Data de Nascimento')); ?>

                                <?php echo e(Form::text('data_nasc', null, ['class' => 'form-control', 'id'=>'datepicker'])); ?>

                                <?php echo e(Form::label('profissao','Profissão')); ?>

                                <?php echo e(Form::input('text','profissao', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Profissão'])); ?>

                                <?php echo e(Form::label('mesa_diretora','Mesa Diretora')); ?>

                                <?php echo e(Form::select('mesa_diretora', $categories, null, ['class' => 'form-control'])); ?><br />
                                <?php echo e(Form::label('imagem','Escolha a Imagem')); ?>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="imagem" id="validatedCustomFile" accept="image/*" onchange="loadFile(event)">
                                        <label class="custom-file-label" for="validatedCustomFile">Escolha o arquivo...</label>
                                    </div>
                                    <br /><br /><label>Foto Selecionada</label><br />
                                    <img style="margin-top: 20px;max-width: 360px;min-width: 250px;width: 100%;" id="output" />
                                    <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script><br /><br />
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