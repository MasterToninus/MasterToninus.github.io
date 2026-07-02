<?php
require_once __DIR__ . '/src/gunter.php';

gunter_head('34st3r-3ggs: F4CC14T4', './');
gunter_navbar('./', 'facciata');
?>

<div class="container">
    <div class="jumbotron">
        <h1>Facciata Informatica</h1>
        <p>Protocollo di tutti i profili pubblici da mantenere.</p>
    </div>

    <div class="row tall-row markdown-content">
        <div class="col-md-5">
            <?php echo gunter_render_markdown_file(__DIR__ . '/vetrine.md'); ?>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <?php echo gunter_render_markdown_file(__DIR__ . '/todo-facciata.md'); ?>
        </div>
    </div>
</div>

<?php gunter_footer(); ?>
