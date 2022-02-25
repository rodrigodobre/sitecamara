<?php

use App\Models\Noticia;
use Illuminate\Support\Facades\DB;

$novidades = Noticia::orderBy('data_n', 'desc')->skip(4)->take(4)->get();

?>
<br/>
<h2>Últimas Notícias</h2>
<hr />
<div class="noticias_index">
    <?php $__currentLoopData = $novidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($noticia->publicado == true): ?>
            <a href="#" style=":hover{color:#3a3a3a;}">
                <?php if($i == 0 OR $i == 2): ?>
                   <ul style="margin-left: 0;">
                <?php else: ?>
                    <ul style="margin-left: 30px;">
                <?php endif; ?>
                        <li class="foto_noticia_index">
                            <div>
                                <?php
                                $texto_sem_tags = strip_tags($noticia->texto);
                                $resumo = $ajuda->resumo(($texto_sem_tags), 140);
                                $texto_sem_tags = strip_tags($noticia->titulo,'utf-8');
                                $resumo1 = $ajuda->resumo(($texto_sem_tags), 45);
                                ?>

                                        <ul>
                                            <li><a href='noticias/<?php echo e($noticia->id); ?>'><img alt="<?php echo e($noticia->foto->nome); ?>" src='<?php echo e(asset($noticia->foto->foto_src)); ?>' /></a>
                                                <div class="fundo"></div>
                                                <div class="texto"></div>
                                            </li>
                                        </ul>

                            </div><!-- Esse primeiro é para a foto -->
                            <div class="sobrepor">
                                <?= $resumo1 ?>
                            </div><!-- O segundo é para o texto do título -->
                        </li>
                        <li class="texto_noticia_index">
                            <p>
                                <?= $resumo ?>
                            </p>
                        </li>
                        <li class="social_noticia_index">
                            <div>Câmara</div>
                            <div style="text-align: right;"><?= date("d-m-Y", strtotime($noticia->data_n)); ?></div>
                        </li>
                </ul>
            </a>
            <?php endif; ?>
        <?php
            $i++;
        ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
