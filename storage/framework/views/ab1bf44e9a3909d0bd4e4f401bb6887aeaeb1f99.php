<div class="menu_fundo">
    <div class="celular">
        <input id="abre_menu" type="button" value="&#9776;" />
    </div>
    <div class="novo_menu">
        <ul>
            <li>
                <a href='/'>Inicial</a>
            </li>
            <li>
                <a id='abrir'>Legislativo</a>
                <ul id='abrirul'>
                    <li><a href='/vereadores'>Legislatura Atual</a></li>
                    <li><a href='/mesa-diretora'>Mesa Diretora</a></li>
                    <li><a href='/resenhas'>Resenhas</a></li>
                    <li><a href='/indicacoes'>Indicações</a></li>
                    <li><a href='/legislativo'>Leis</a></li>
                    <li><a href='/ex-presidentes'>Ex-Presidentes</a></li>
                    <li><a href="/institucional">Institucional</a></li>
                </ul>
            </li>
            <li>
                <a id='abrir1'>Notícias</a>
                <ul id='abrirul1'>
                    <li><a href='/destaques'>Destaques</a></li>
                    <li><a href='/eventos'>Eventos</a></li>
                    <li><a href='/noticias'>Últimas Notícias</a></li>
                </ul>
            </li>
            <li>
                <a id='abrir2'>Município</a>
                <ul id='abrirul2'>
                    <li><a href='/municipio'>História do Município</a></li>
                    <li><a target="_blank" href='https://pontapora.ms.gov.br/v2/diario-oficial/'>Diário Oficial</a></li>
                </ul>
            </li>
            <li>
                 <a href='/tvcamara'>TV Câmara</a>
            </li>
            <li>
                <a href="http://web.qualitysistemas.com.br/portal/transparencia_publica/camara_municipal_de_ponta_pora">Brasil Transparente</a>
            </li>
        </ul>
    </div>
    <div class="pesquisar" style="height: 50px;">
        <?php echo e(Form::open(['url' => 'resultado','method' => 'PATCH','enctype' => 'multipart/form-data', 'id' => 'pesquisa'])); ?>

            <?php echo csrf_field(); ?>
            <?php echo e(Form::input('text','pesquisa',null,['placeholder' => 'Pesquisar', 'style' => 'margin-top: 2px;'])); ?>

            <input type="submit" style="display:none" />
            <button id="botao" style="border:none;background: none;"><img src="<?php echo e(asset('public/img/pesquisa.png')); ?>" style="cursor:pointer;" /></button>
        <?php echo e(Form::close()); ?>

    </div>
</div>
