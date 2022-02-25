<div class="centro logotipo" style="position: relative;width: 100%;padding:5px;">
    <div style="display: inline-block;">
        <a href="/">
            <img src="<?php echo e(asset('public/img/logo_cmpp.png')); ?>" style="float:left;margin-top:10px;" />
        </a>
    </div>
    <div class="naoprecisa">
        <!--
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSd3xY-azRqN3qnE5nE2nHMa9WrTU2VTMl-d0sTlpVG-0i9uew/viewform">
                <img src=" #asset('public/img/mpms1.jpg') }}" style="width: 100%"/>
            </a>
            -->
    </div>
</div>
<div class="centro menu">
    <?php echo $__env->make('layouts/site/menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
