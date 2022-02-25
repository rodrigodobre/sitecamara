<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php use App\Models\Autor; ?>
<?php $tipo = [' ','Lei','Lei Complementar','Decreto','Resolução']; ?>
<?php $status = [' ','Em Vigor','Sem Efeito','Vigência Esgotada','Revogada','Inconstitucional','Revogada Tacitamente','Repristinada']; ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações da Lei Abaixo
                        <a class="float-right" href="<?php echo e(url('admin/leis')); ?>">Listagem Leis</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                            <?php if(Request::is('*/editar')): ?>
                                <?php echo e(Form::model($lei, ['method' => 'PATCH','url' => 'admin/leis/'.$lei->id, 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['url' => 'admin/leis/salvar', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                        <div class="panel-body">
                                <?php if(!isset($data_sancao)): ?>
                                    <?php $data_sancao = null; ?>
                                <?php else: ?>
                                    <?php $data_sancao = date("d-m-Y", strtotime($lei->data_sancao)); ?>
                                <?php endif; ?>
                                <?php if(!isset($data_publicacao)): ?>
                                    <?php $data_publicacao = null; ?>
                                <?php else: ?>
                                    <?php $data_publicacao = date("d-m-Y", strtotime($lei->data_publicacao)); ?>
                                <?php endif; ?>
                                <?php if(isset($lei->lei_source)): ?>
                                    <img src="<?php echo e(asset($lei->lei_source)); ?>" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php endif; ?>
                                <?php echo e(Form::label('tipo','Tipo')); ?>

                                <?php echo e(Form::select('tipo', $tipo, null, ['class' => 'form-control'])); ?><br />
                                <?php echo e(Form::label('numero','Número')); ?>

                                <?php echo e(Form::input('text','numero',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '123'])); ?><br />
                                <?php echo e(Form::label('data_sancao','Data da Sanção')); ?>

                                <?php echo e(Form::text('data_sancao', $data_sancao, ['class' => 'form-control funcionardata'])); ?><br />
                                <?php echo e(Form::label('data_publicacao','Data da Publicação')); ?>

                                <?php echo e(Form::text('data_publicacao', $data_publicacao, ['class' => 'form-control funcionardata'])); ?><br />
                                <?php echo e(Form::label('ementa','Ementa')); ?>

                                <?php echo e(Form::input('text','ementa', null,['class' => 'form-control'])); ?><br />
                                <?php echo e(Form::label('palavra_chave','Palavra-Chave')); ?>

                                <?php echo e(Form::input('text','palavra_chave', null,['class' => 'form-control'])); ?><br />
                                <?php echo e(Form::label('status','Status')); ?>

                                <?php echo e(Form::select('status', $status, null, ['class' => 'form-control'])); ?><br />
                                <span style="text-align: left;display: block;">Autores<span/>
                                <?php if(!isset($lei)): ?>
                                    <div id="origem" align="center" style="text-align: left;"> 
                                        <input class="form-control" type="text" id="autores" name="autores[]" />  
                                        <img  src="<?php echo e(asset('public/img/add.png')); ?>" style="cursor: pointer;" onclick="duplicarCampos();" width='28'>  
                                        <img  src="<?php echo e(asset('public/img/remove.png')); ?>" style="cursor: pointer;" onclick="removerCampos(this);" width='32'>   
                                    </div>
                                    <div id="destino">  
                                    </div>  
                                <?php else: ?>
                                    <?php
                                        $autores = Autor::where('fk_lei',$lei->id)->get();
                                    ?>
                                    <div id="destino">  
                                    <?php $__currentLoopData = $autores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <input class="form-control" type="text" id="autores" name="autores[]" value="<?php echo e($autor->nome_autor); ?>" />   
                                         <img  src="<?php echo e(asset('public/img/remove.png')); ?>" style="cursor: pointer;" onclick="removerCampos(this);" width='32'>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>    
                                    <div id="origem1" align="center" style="text-align: left;"> 
                                            <input class="form-control" type="text" id="autores" name="autores[]" />
                                            <img  src="<?php echo e(asset('public/img/add.png')); ?>" style="cursor: pointer;" onclick="duplicarCampos2();" width='28'>  
                                            <img  src="<?php echo e(asset('public/img/remove.png')); ?>" style="cursor: pointer;" onclick="removerCampos2(this);" width='32'> 
                                    </div>
                                    <div id="destino1">  
                                    </div>  
                                <?php endif; ?> 
                                                              
                                <?php echo e(Form::label('arquivo','Escolha o Arquivo PDF')); ?>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="arquivo" id="validatedCustomFile" accept="application/pdf" onchange="loadFile(event)">
                                    <label class="custom-file-label" for="validatedCustomFile">Escolha o arquivo...</label>
                                </div>
                                <br /><br /><label>Arquivo Selecionado</label><br />
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