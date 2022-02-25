<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <?php
                            if(isset($destaques)){
                                $titulo_superior = "DESTAQUES";
                                $lista = "Lista de destaques";
                                $url = 'admin/destaques';
                            }
                            else{
                                $titulo_superior = "NOTÍCIAS";
                                $lista = "Lista de notícias";
                                $url = "admin/noticias";
                            }
                        ?>
                        <?php echo e($titulo_superior); ?>

                        <a class="float-right" href="<?php echo e(url($url)); ?>"><?php echo e($lista); ?></a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                            <?php if(Request::is('*/editar')): ?>
                                <?php echo e(Form::model($noticia, ['method' => 'PATCH','url' => $url.'/'.$noticia->id, 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['url' => $url.'/salvar', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <div class="panel-body">
                                <?php
                                if(isset($foto)){
                                ?>
                                <img src="<?php echo e(asset($foto)); ?>" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                   $texto = $noticia->texto;
                                   $data_n = date("d-m-Y", strtotime($noticia->data_n));
                                }
                                else{
                                    $texto = "Digite aqui o texto da matéria";
                                    $data_n = null;
                                }
                                ?>
                                <?php echo e(Form::label('titulo','Título')); ?>

                                <?php echo e(Form::input('text','titulo',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Título'])); ?><br />
                                <?php echo e(Form::label('texto','Texto')); ?><br />

                                <?php echo e(Form::textarea('texto',$texto, null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Digite a matéria', 'id' => 'texto'])); ?>

                                    <script>
                                        CKEDITOR.replace( 'texto' );
                                    </script>
                                <br />
                                <?php echo e(Form::label('credito','Crédito')); ?>

                                <?php echo e(Form::input('text','credito',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Crédito'])); ?>

                                <?php echo e(Form::label('fotografo','Fotógrafo')); ?>

                                <?php echo e(Form::input('text','fotografo',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Fotógrafo'])); ?>

                                <?php echo e(Form::label('data_n','Data da Notícia')); ?>

                                <?php echo e(Form::text('data_n', $data_n, ['class' => 'form-control', 'id'=>'datepicker'])); ?>

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