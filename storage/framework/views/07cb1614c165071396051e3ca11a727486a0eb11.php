<?php

use App\Http\Controllers\Helpers;
use App\Models\Noticia;

    $noticias = Noticia::orderBy('id', 'desc')->where('publicado',true)->take(1)->get();
    $ajuda = new Helpers();

?>
<div class="centro" style="max-width: 1215px">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
                <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $texto_resumido = $ajuda->resumo($noticia->texto,20);
                    ?>
                    <?php if($noticia->publicado == true): ?>
                            <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                                <a href="noticias/<?php echo e($noticia->id); ?>">
                                    <img class="d-block img-fluid w-100 altura_variavel" src="<?php echo e(asset($noticia->foto->foto_src)); ?>" alt="<?php echo e($noticia->titulo); ?>" style="max-height: 680px;min-height: 250px;height:100%;" />
                                </a>
                                <div class="carousel-caption">
                                    <h2 class="fonte_variavel" style="color: white; text-shadow: black 0.1em 0.1em 0.2em;"><?php echo e($noticia->titulo); ?></h2>
                                </div>
                            </div>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo e(asset('public/img/banner.png')); ?>" alt="First slide" style="max-height: 768px;min-height: 250px;height:100%;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo e(asset('public/img/banner1.png')); ?>" alt="Second slide" style="max-height: 768px;min-height: 250px;height:100%;">
    </div>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br />
<br />
