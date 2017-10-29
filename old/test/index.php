



<!DOCTYPE html>
<html>
<body>

	Prova PHP

<?php
$row = 1;
if (($handle = fopen("data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}
?>

<?php

$array = array_map('str_getcsv', file('data.csv'));

$header = array_shift($array);

array_walk($array, '_combine_array', $header);

function _combine_array(&$row, $key, $header) {
  $row = array_combine($header, $row);
}

?>



</body>
</html>

