<?php
require_once __DIR__ . '/../src/gunter.php';

gunter_head('C0mput3rs H1story', '../');
gunter_navbar('../', 'hardware');

$dataFile = __DIR__ . '/pc_data.json';
$pcData = gunter_load_json($dataFile);
$lastModified = file_exists($dataFile) ? date('F d, Y H:i:s', filemtime($dataFile)) : 'Unknown';

function hardware_cost($value): int
{
    return is_numeric($value) ? (int) $value : 0;
}

function hardware_print_component_link(array $details, bool $strikethrough = false): void
{
    $model = gunter_h($details['model'] ?? 'Unknown model');
    $url = gunter_h($details['url'] ?? '#');
    $label = $strikethrough ? '<s>' . $model . '</s>' : $model;
    echo '<a href="' . $url . '" target="_blank" rel="noopener">' . $label . '</a>';
}
?>

<div class="container">
    <div class="jumbotron">
        <h1>My Personal Computer History</h1>
        <p>Note: <a href="https://pcpartpicker.com/user/Toninus/saved/TJ8gXL">pcpartpicker</a> automatically generates the HTML.</p>
    </div>

    <?php if (empty($pcData)): ?>
        <div class="alert alert-warning">No PC data available. Check <code>pc_data.json</code>.</div>
    <?php endif; ?>

    <?php foreach ($pcData as $pc): ?>
        <?php
        $pcTotalCost = 0;
        $pcRevisionCosts = 0;
        $components = $pc['components'] ?? [];

        foreach ($components as $details) {
            $pcTotalCost += hardware_cost($details['cost'] ?? null);
            if (!empty($details['revision']) && is_array($details['revision'])) {
                $pcRevisionCosts += hardware_cost($details['revision']['cost'] ?? null);
            }
            if (!empty($details['addition']) && is_array($details['addition'])) {
                $pcRevisionCosts += hardware_cost($details['addition']['cost'] ?? null);
            }
        }
        ?>
        <div class="row tall-row">
            <div class="col-md-12">
                <h2 class="text-center">
                    <a href="<?php echo gunter_h($pc['url'] ?? '#'); ?>" target="_blank" rel="noopener">
                        <?php echo gunter_h($pc['name'] ?? 'Unnamed PC'); ?>
                    </a>
                </h2>
                <hr>
            </div>

            <div class="col-md-6">
                <div class="box">
                    <p><strong>Build Date:</strong> <?php echo gunter_h($pc['build_date'] ?? 'Unknown'); ?></p>
                    <p><strong>Total Cost:</strong> <?php echo gunter_h($pcTotalCost); ?></p>
                    <p><strong>Revision Costs:</strong> <?php echo gunter_h($pcRevisionCosts); ?></p>
                    <?php foreach (($pc['notes'] ?? []) as $note): ?>
                        <p><?php echo gunter_h($note); ?></p>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo gunter_h($pc['album'] ?? '#'); ?>" target="_blank" rel="noopener">
                    <img src="<?php echo gunter_h($pc['image'] ?? ''); ?>" alt="<?php echo gunter_h($pc['name'] ?? 'PC'); ?>" class="img-responsive">
                </a>
            </div>

            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Component</th>
                                <th>Model</th>
                                <th>Cost</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($components as $component => $details): ?>
                                <?php
                                $revision = !empty($details['revision']) && is_array($details['revision']) ? $details['revision'] : null;
                                $addition = !empty($details['addition']) && is_array($details['addition']) ? $details['addition'] : null;
                                ?>
                                <tr>
                                    <td><?php echo gunter_h($component); ?></td>
                                    <td><?php hardware_print_component_link($details, (bool) $revision); ?></td>
                                    <td><?php echo gunter_h($details['cost'] ?? ''); ?></td>
                                    <td><?php echo $revision ? 'v' : ''; ?></td>
                                </tr>
                                <?php foreach ([$revision, $addition] as $update): ?>
                                    <?php if ($update): ?>
                                        <tr>
                                            <td></td>
                                            <td><?php hardware_print_component_link($update); ?></td>
                                            <td><?php echo gunter_h($update['cost'] ?? ''); ?></td>
                                            <td><?php echo gunter_h($update['date'] ?? ''); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
 gunter_footer([
    '&copy; ' . date('Y') . ' My Personal Computer History',
    'Last updated: ' . gunter_h($lastModified),
]);
?>
