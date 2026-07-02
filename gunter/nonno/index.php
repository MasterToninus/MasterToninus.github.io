<?php
require_once __DIR__ . '/../src/gunter.php';

$chapters = [];
$chapterDir = __DIR__ . '/Capitoli';

if (is_dir($chapterDir)) {
    foreach (new DirectoryIterator($chapterDir) as $fileInfo) {
        if ($fileInfo->isDot() || !$fileInfo->isFile() || strtolower($fileInfo->getExtension()) !== 'md') {
            continue;
        }

        $basename = $fileInfo->getBasename('.md');
        $separator = strpos($basename, '_');

        if ($separator === false) {
            continue;
        }

        $key = substr($basename, 0, $separator);
        $title = substr($basename, $separator + 1);
        $chapters[(int) $key] = [
            'key' => $key,
            'title' => $title,
            'file' => $fileInfo->getPathname(),
        ];
    }
}

ksort($chapters, SORT_NUMERIC);

gunter_head('34st3r-3ggs: Foglie Sparse', '../');
gunter_navbar('../', 'nonno');
?>

<div class="container">
    <div class="jumbotron">
        <h1>Foglie Sparse</h1>
        <p>Conversione del libro di Nonno Michele.</p>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <video class="responsive-media" width="320" height="240" controls>
                <source src="movie.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="col-lg-6">
            <div class="list-group">
                <?php foreach ($chapters as $chapter): ?>
                    <a class="list-group-item" href="#Cap_<?php echo gunter_h($chapter['key']); ?>">
                        <?php echo gunter_h($chapter['key'] . ' = ' . $chapter['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php foreach ($chapters as $chapter): ?>
        <div class="row tall-row markdown-content" id="Cap_<?php echo gunter_h($chapter['key']); ?>">
            <div class="col-lg-12">
                <?php echo gunter_render_markdown_file($chapter['file']); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php gunter_footer(); ?>
