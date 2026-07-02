<?php
require_once __DIR__ . '/../src/gunter.php';

gunter_head('Smartphone History', '../');
gunter_navbar('../', 'smartphones');

$dataFile = __DIR__ . '/smartphone_data.json';
$smartphones = gunter_load_json($dataFile);
$lastModified = file_exists($dataFile) ? date('F d, Y H:i:s', filemtime($dataFile)) : 'Unknown';

function smartphone_price_label(array $phone): string
{
    if (!empty($phone['price_label'])) {
        return (string) $phone['price_label'];
    }

    if (isset($phone['estimated_price_eur']) && is_numeric($phone['estimated_price_eur'])) {
        return '€' . (string) $phone['estimated_price_eur'];
    }

    return '';
}

function smartphone_min_years_for_target(array $phone): string
{
    $price = $phone['estimated_price_eur'] ?? null;
    $target = $phone['target_eur_per_year'] ?? null;

    if (!is_numeric($price) || !is_numeric($target) || (float) $target <= 0) {
        return '';
    }

    $years = (float) $price / (float) $target;
    return number_format($years, 1) . ' years';
}
?>

<div class="container">
    <div class="jumbotron">
        <h1>My Smartphone History</h1>
        <p class="lead">Preliminary list of personal smartphones, estimated prices and rough target cost per year.</p>
        <p><a href="index.php">Back to computer history</a></p>
    </div>

    <?php if (empty($smartphones)): ?>
        <div class="alert alert-warning">No smartphone data available. Check <code>smartphone_data.json</code>.</div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <h2>Cost target</h2>
                    <ul>
                        <li>First two phones: about 100€/year.</li>
                        <li>Later phones: about 120€/year.</li>
                    </ul>
                    <p>The table reports the minimum duration needed to reach the target, when both price and target are known.</p>
                </div>
            </div>

            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped hardware-table">
                        <thead>
                            <tr>
                                <th>Year / period</th>
                                <th>Model</th>
                                <th>Estimated price</th>
                                <th>Target</th>
                                <th>Minimum duration</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($smartphones as $phone): ?>
                                <tr>
                                    <td><?php echo gunter_h($phone['period'] ?? ''); ?></td>
                                    <td><?php echo gunter_h($phone['model'] ?? ''); ?></td>
                                    <td><?php echo gunter_h(smartphone_price_label($phone)); ?></td>
                                    <td>
                                        <?php if (isset($phone['target_eur_per_year']) && is_numeric($phone['target_eur_per_year'])): ?>
                                            <?php echo gunter_h($phone['target_eur_per_year']); ?>€/year
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo gunter_h(smartphone_min_years_for_target($phone)); ?></td>
                                    <td><?php echo gunter_h($phone['notes'] ?? ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
 gunter_footer([
    '&copy; ' . date('Y') . ' My Smartphone History',
    'Last updated: ' . gunter_h($lastModified),
]);
?>
