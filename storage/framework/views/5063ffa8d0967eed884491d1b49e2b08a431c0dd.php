<?php
    use App\Http\Controllers\Helpers;
    $ajuda = new Helpers();
?>

<?php $__env->startSection('content'); ?>
<div class="centro" style="text-align:justify-all;">
    <div class="container">
    <h1>Consulta Pública para Revisar o Código Urbanístico (2021)</h1><br />
    <p>A Prefeitura Municipal de Ponta Porã está revisando o <b>Código Urbanístico</b> (Lei Complementar n° 71, de 17 de Dezembro de 2010) para se adequar ao planejamento proposto no Plano Diretor do Município (Lei Complementar nº 197, de 15 de Abril de 2020).</p>
    <!-- stoled -->
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <p style="text-align: center;font-size: x-large;font-weight: bold;margin-top: 15px;margin-bottom: 25px;">Dê a sua sugestão até o dia 20 de junho de 2021.</p>
                            <div class="lgc-column lgc-grid-parent lgc-grid-30 lgc-tablet-grid-30 lgc-mobile-grid-100 lgc-equal-heights" style="text-align: center;display:inline-block;margin-right: 15px;margin-bottom: 15px;">
                                <div class=inside-grid-column>
                                    <button type=button class="btn btn-primary btn-block" onclick=BotaoCodigoPostura()>Código de Postura</button>
                                </div>
                            </div>
                            <div class="lgc-column lgc-grid-parent lgc-grid-40 lgc-tablet-grid-40 lgc-mobile-grid-100 lgc-equal-heights" style="text-align: center;display:inline-block;margin-right: 15px;margin-bottom: 15px;">
                                <div class=inside-grid-column>
                                    <button type=button class="btn btn-primary btn-block" onclick=BotaoParcelamentoSolo()>Lei do Parcelamento do Solo</button>
                                </div>
                            </div>
                            <div class="lgc-column lgc-grid-parent lgc-grid-30 lgc-tablet-grid-30 lgc-mobile-grid-100 lgc-equal-heights" style="text-align: center;display:inline-block;">
                                <div class=inside-grid-column>
                                    <button type=button class="btn btn-primary btn-block" onclick=BotaoOcupacaoSolo()>Lei de Uso e Ocupação do Solo</button>
                                </div>
                            </div><br /><br />
                            <div id="DivCodigoPostura" name="DivCodigoPostura" style="display:none;text-align: justify;">
                                Para isto, elaborou uma proposta para o novo 
                                <strong>Código de Posturas</strong>
                                 com o objetivo de preservar a ordem pública, o bem-estar coletivo e estabelecer os procedimentos para o licenciamento de qualquer atividade de natureza urbana (inclusive as construções), públicas ou privadas, no Município de Ponta Porã.
                                <br />
                                <br />
                                <strong>Conheça a minuta do Anteprojeto abaixo e depois dê sua sugestão. Sua colaboração é importante.</strong>
                                <br>
                                <a href=https://q8x7y6p6.stackpathcdn.com/v2/wp-content/uploads/2021/06/ANTEPROJETODELEI_CODIGO_DE_POSTURAS-VERSAO_CONSULTA_PUBLICA.pdf target=_blank>
                                    Minuta do Anteprojeto da Lei que Institui o Código de Posturas do Município de Ponta Porã 
                                    <img src=https://q8x7y6p6.stackpathcdn.com/v2/wp-content/uploads/2020/11/icon_pdf.png>
                                </a>
                                <br />
                                <br />
                            </div>
                            <div id="DivParcelamentoSolo" name="DivParcelamentoSolo" style="display:none;text-align: justify;">
                                Para isto, elaborou uma proposta para a nova 
                                <strong>Lei de Parcelamento do Solo</strong>
                                 com o objetivo de orientar os projetos ou obras de loteamento e outros parcelamentos na área urbana, prevenindo a ocupação de áreas impróprias e evitando a comercialização de lotes inadequados às atividades urbanas.
                                <br />
                                <br />
                                <strong>Conheça a minuta do Anteprojeto abaixo e depois dê sua sugestão. Sua colaboração é importante.</strong>
                                <br>
                                <a href=https://q8x7y6p6.stackpathcdn.com/v2/wp-content/uploads/2021/06/PROJETO_DE_LEI_PARCELAMENTO_DO_SOLO_VERSAO_FINAL.pdf target=_blank>
                                    Minuta do Anteprojeto da Lei de Parcelamento do Solo Urbano do Município de Ponta Porã 
                                    <img src=https://q8x7y6p6.stackpathcdn.com/v2/wp-content/uploads/2020/11/icon_pdf.png>
                                </a>
                                <br />
                                <br />
                            </div>
                            <div id="DivOcupacaoSolo" name="DivOcupacaoSolo" style="display:none;text-align: justify;">
                                Para isto, elaborou uma proposta para a nova 
                                <strong>Lei de Uso e Ocupação do Solo</strong>
                                 com o objetivo de ordenar o desenvolvimento da Cidade, estruturar e fortalecer os bairros, consolidar as centralidades urbanas e promover o adensamento adequado para a sustentabilidade urbana, econômica, social e ambiental.
                                <br />
                                <br />
                                <strong>Conheça a minuta do Anteprojeto abaixo e depois dê sua sugestão. Sua colaboração é importante.</strong>
                                <br>
                                <a href=https://q8x7y6p6.stackpathcdn.com/v2/wp-content/uploads/2021/06/MINUTADOANTEPROJETODALEIUSOEOCUPACAODOSOLO_VERSAOCONSULTAPUBLICA.pdf target=_blank>
                                    Minuta do Anteprojeto da Lei de Uso e Ocupação do Solo Urbano do Município de Ponta Porã 
                                    <img src=https://q8x7y6p6.stackpathcdn.com/v2/wp-content/uploads/2020/11/icon_pdf.png>
                                </a>
                                <br />
                                <br />
                            </div>
                                <?php if(session('mensagem_sucesso')): ?>
        <div class="alert alert-success" role="alert">
             <?php echo e(session('mensagem_sucesso')); ?>

        </div>
    <?php endif; ?> 
               </div>             
        </div>
    </div> 

    <div class="container">
        <?php echo e(Form::open(['url' => 'consulta/salvar', 'enctype' => 'multipart/form-data'])); ?>

        <?php echo e(Form::label('bairro','Qual bairro você mora?')); ?>

            <?php echo e(Form::input('text','bairro',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '', 'maxlenght' => '150', 'spellcheck' => 'true', 'required' => 'required'])); ?><br />
            <?php echo e(Form::label('sugestao','Escreva aqui a sua sugestão')); ?><br />
            <?php echo e(Form::textarea('sugestao', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '', 'maxlenght' => '3000', 'spellcheck' => 'true', 'required' => 'required'])); ?><br />
            <?php echo e(Form::submit('Enviar Sugestão',['class' => 'btn btn-primary'])); ?>

        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script language=JavaScript src="https://q8x7y6p6.stackpathcdn.com/v2/wp-content/plugins/PMPontaPora2021/js/ConsultaPublicaPlanoDiretor2021.js?v=1.07"></script>
<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>