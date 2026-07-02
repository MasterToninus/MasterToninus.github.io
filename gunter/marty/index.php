<?php
require_once __DIR__ . '/../src/gunter.php';

$directories = [];
foreach (scandir(__DIR__) as $element) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . $element;
    if ($element !== '.' && $element !== '..' && is_dir($path)) {
        $directories[] = $element;
    }
}

gunter_head('Marty -- Workspace', '../');
gunter_navbar('../');
?>

<div class="container">
    <div class="jumbotron">
        <h1>Marty -- Workspace</h1>
        <p>Spazio di test.</p>
    </div>

    <div class="row tall-row">
        <div class="col-md-12">
            <h2>Sottocartelle</h2>
            <hr>
            <?php if (empty($directories)): ?>
                <p>Nessuna sottocartella disponibile.</p>
            <?php else: ?>
                <div class="list-group">
                    <?php foreach ($directories as $directory): ?>
                        <a class="list-group-item" href="<?php echo gunter_h($directory); ?>/">
                            <?php echo gunter_h($directory); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php gunter_footer(); ?>
