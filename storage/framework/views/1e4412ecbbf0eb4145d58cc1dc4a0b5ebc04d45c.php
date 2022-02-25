<?php

use Carbon\Carbon;
if(isset($resenha)){
$date = Carbon::parse($resenha->data_sessao)->locale('pt_BR')->format('d-m-Y');
}
?>

<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $tipo_de_sessao = ['Sessão Ordinária','Sessão Extraordinária','Sessão Solene','Audiência Pública']; ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações da resenha Abaixo
                        <a class="float-right" href="<?php echo e(url('admin/resenhas')); ?>">Listagem resenhas</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                            <?php if((Request::is('*/editar')) OR (isset($resenha))): ?>
                                <?php echo e(Form::model($resenha, ['method' => 'PATCH','url' => 'admin/resenhas/'.$resenha->id, 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php echo e(Form::open(['url' => 'admin/resenhas/salvar', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                        <div class="panel-body">
                                <?php if(isset($resenha->pdf_vinculado)): ?>
                                    <img src="<?php echo e(asset($resenha->pdf_vinculado)); ?>" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php endif; ?>
                                <?php echo e(Form::label('tipo_de_sessao','Tipo de Sessão')); ?>

                                <?php echo e(Form::select('tipo_de_sessao', $tipo_de_sessao, null, ['class' => 'form-control'])); ?><br />
                                <?php echo e(Form::label('numero_sessao','Número da Sessão')); ?>

                                <?php echo e(Form::input('text','numero_sessao',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '05'])); ?><br />
                                <?php echo e(Form::label('data_sessao','Data da Sessão')); ?>

                                <?php if(!isset($date)): ?>
                                    <?php $date = null;?>
                                <?php endif; ?>
                                <?php echo e(Form::date('data_sessao', $date, ['class' => 'form-control funcionardata','locale' => 'pt_BR' ,'format' => 'd-m-Y'])); ?><br />
                                <?php echo e(Form::label('descritivo','Descrição da Sessão')); ?>

                                <?php echo e(Form::input('text','descritivo',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Ex: Audiência Pública para decidir novo orçamento'])); ?><br />
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