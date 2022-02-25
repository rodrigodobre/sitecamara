<?php $__env->startSection('content'); ?>
<?php
$permissao = ['Administrador','Imprensa','Juridico'];
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <?php if(isset($usuario)): ?>
                    <div class="card-header">Editar Usuário</div>
                <?php else: ?>
                    <div class="card-header">Novo Usuário</div>
                <?php endif; ?>
                <div class="card-body">
                    <?php if(session('mensagem_sucesso')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('mensagem_sucesso')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Request::is('*/editar')): ?>
                        <?php echo e(Form::model($usuario, ['method' => 'PATCH','url' => 'usuarios/'.$usuario->id.'/atualizar', 'enctype' => 'multipart/form-data'])); ?>

                    <?php else: ?>
                        <?php echo e(Form::open(['url' => route('register'), 'enctype' => 'multipart/form-data'])); ?>

                    <?php endif; ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <?php if(isset($usuario->name)): ?>
                                    <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e($usuario->name); ?>" required autofocus>
                                <?php else: ?>
                                    <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                                <?php endif; ?>
                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <?php if(isset($usuario->email)): ?>
                                    <input id="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($usuario->email); ?>" required>
                                <?php else: ?>
                                    <input id="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                                <?php endif; ?>
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(!isset($usuario->id)): ?>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme a Senha</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <label for="permissao" class="col-md-4 col-form-label text-md-right">Permissão</label>
                            <div class="col-md-6">
                                <?php echo e(Form::select('permissao', $permissao, null, ['class' => 'form-control'])); ?>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php if(isset($usuario)): ?>
                                        Salvar
                                    <?php else: ?>
                                        Registrar
                                    <?php endif; ?>
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>