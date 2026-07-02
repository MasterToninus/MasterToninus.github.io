<?php
require_once __DIR__ . '/../src/gunter.php';

$folder = __DIR__ . '/../../img';

function gallery_get_images(string $dir): array
{
    $images = [];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!is_dir($dir)) {
        return [];
    }

    foreach (scandir($dir) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $filePath = $dir . DIRECTORY_SEPARATOR . $file;

        if (is_dir($filePath)) {
            $images = array_merge($images, gallery_get_images($filePath));
        } elseif (is_file($filePath)) {
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            if (in_array($extension, $allowedExtensions, true)) {
                $images[] = $filePath;
            }
        }
    }

    return $images;
}

$imageFiles = gallery_get_images($folder);

gunter_head('Image Gallery', '../');
gunter_navbar('../', 'gallery');
?>

<div class="container">
    <div class="jumbotron">
        <h1>Image Gallery</h1>
        <p>Galleria generata ricorsivamente dalla cartella immagini.</p>
    </div>

    <?php if (empty($imageFiles)): ?>
        <div class="alert alert-warning">No images found in the specified folder.</div>
    <?php else: ?>
        <div class="row tall-row">
            <?php foreach ($imageFiles as $image): ?>
                <?php $relative = '../' . ltrim(str_replace(dirname(__DIR__, 2), '', $image), '/'); ?>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a class="thumbnail" href="<?php echo gunter_h($relative); ?>" target="_blank" rel="noopener">
                        <img src="<?php echo gunter_h($relative); ?>" alt="Image thumbnail">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php gunter_footer(); ?>
