<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Resenhas</b>
                        <a class="float-right" href="<?php echo e(url('admin/resenhas/novo')); ?>">Nova resenha</a>
                    </div>

                    <div class="card-body">
                        <?php if(session('mensagem_sucesso')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('mensagem_sucesso')); ?>

                            </div>
                        <?php endif; ?>
                        <table class="table">
                            <th> </th>
                            <th>Tipo de Sessão</th>
                            <th>Data da Sessão</th>
                            <th>Número da Sessão</th>
                            <th>Ações</th>
                            <?php if(isset($resenhas)): ?>
                            <?php $__currentLoopData = $resenhas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resenha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr>
                                    <td><img src="<?php echo e(asset($resenha->pdf_vinculado)); ?>" width="50" class="img-thumbnail"/></td>
                                    <td>
                                        <?php
                                        if ($resenha->tipo_de_sessao == 0) {
                                            echo "Sessão Ordinária";
                                        }
                                        if ($resenha->tipo_de_sessao == 1) {
                                            echo "Sessão Extraordinária";
                                        }
                                        if ($resenha->tipo_de_sessao == 2) {
                                            echo "Sessão Solene";
                                        }
                                        if ($resenha->tipo_de_sessao == 3) {
                                            echo "Audiência Pública";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php $data = date("d-m-Y", strtotime($resenha->data_sessao)); echo $data; ?>
                                    </td>
                                    <td>
                                        <?php echo e($resenha->numero_sessao); ?>

                                    </td>
                                    <td>
                                        <a href="resenhas/<?php echo e($resenha->id); ?>/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        <?php echo e(Form::open(['method' =>'DELETE','url' => 'admin/resenhas/'.$resenha->id, 'style' => 'display:inline'])); ?>

                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                        <?php echo e(Form::close()); ?>

                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                         <?php echo e($resenhas->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>