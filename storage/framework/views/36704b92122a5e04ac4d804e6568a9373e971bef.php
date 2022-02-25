<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Helpers;

$i = 0;
$ajuda = new Helpers();
$fotos = DB::table('fotos')->get();
$propaganda = DB::table('fotos')->where('nome','LIKE','%banner_consulta%')->get();
?>

<?php $__env->startSection('content'); ?>
    <div class="index">
        <?php if ($__env->exists("layouts.site.banners")) echo $__env->make("layouts.site.banners", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if ($__env->exists("layouts.site.menu_acesso")) echo $__env->make("layouts.site.menu_acesso", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="centro">
        <!--<div style="margin-top: -20px;margin-bottom: 20px;">
            foreach($propaganda as $prop)
            <a href='/'>
                <img src="{ asset($prop->foto_src) }}" alt="propaganda_institucional" style="width: 98%;text-align: center;margin-left: 1%;margin-right:auto;" />
            </a>
            endforeach
        </div>-->
        <div class="coordena">
            <div class="esquerda">
                <?php if ($__env->exists("layouts.site.noticias_index")) echo $__env->make("layouts.site.noticias_index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists("layouts.site.tvcamara_index")) echo $__env->make("layouts.site.tvcamara_index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="direita">
                <?php if ($__env->exists("layouts.site.menu_lateral")) echo $__env->make("layouts.site.menu_lateral", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists("layouts.site.eventos_index")) echo $__env->make("layouts.site.eventos_index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists("layouts.site.face")) echo $__env->make("layouts.site.face", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if ($__env->exists("layouts.site.soundcloud")) echo $__env->make("layouts.site.soundcloud", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>