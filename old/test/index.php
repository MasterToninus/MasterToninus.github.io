<!DOCTYPE html>
<html>
<body>

	Prova PHP

<script language="javascript">
    document.write("<i><a href=\"https://github.com/MasterToninus/MasterToninus.github.io/commits/master\">Last Edit<\/a> "+document.lastModified+"<\/i>");
</script>

<h1>Versione basic</h1>

<?php

  $today_date = strtotime( date('m/d/y') );
  $Event_Title = 1;
  $Type = 2;
  $Approx_Date = 6;
  $End_Date = 8;
  $Organizers = 9;
  $Url = 10;


  if (($handle = fopen("data.csv", "r")) !== FALSE) {
    
  while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data); //count the number of field
    $end_date = strtotime($data[$End_Date]);
      if($end_date > $today_date){
	echo "<a href=" . $data[$Url] . ">" . $data[$Event_Title] . "</a> ";
	echo "( " . $data[$Type] . ") ";
	echo $data[$Approx_Date] . "<br />\n";
      }
  }
  fclose($handle);
}
?>


<h1>Versione Table</h1>
<!--
Credits to 
https://stackoverflow.com/questions/4746079/how-to-create-a-html-table-from-a-php-array
-->

<?php
  $shop = array();

  if (($handle = fopen("data.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
      $end_date = strtotime($data[8]);
      if($end_date > $today_date){
  	$record = array(
	  "Event_Title" => $data[1],
	  "Type" => $data[2],
	  "Location" => $data[4],
	  "Approx_Date" => $data[6],
	  "End_Date" => $data[8],
	  "Url" => $data[10],
	);
	array_push($shop,$record);
      }
  }
  fclose($handle);
}
?>

<?php if (count($shop) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($shop))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($shop as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>




<h1>Versione Table Ricercata</h1>

<?php
  $table = array();

  if (($handle = fopen("data.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
      $end_date = strtotime($data[8]);
      if($end_date > $today_date){
  	$record = array(
	  "Event_Title" => $data[1],
	  "Type" => $data[2],
	  "Location" => $data[4],
	  "Approx_Date" => $data[6],
	  "End_Date" => $data[8],
	  "Url" => $data[10],
	);
	array_push($table,$record);
      }
  }
  fclose($handle);
}
?>

<?php if (count($table) > 0): ?>
<table>
  <tbody>
<?php foreach ($table as $row): array_map('htmlentities', $row); ?>
    <tr>
      <?php 
	echo "<td>(" . $row["Type"] . ")</td>";
	echo "<td><a href=" . $row["Url"] . ">" . $row["Event_Title"] . "</a></td>";
	echo "<td>" . $row["Location"] . "</td>";
	echo "<td>" . $row["Approx_Date"] . "</td>";
      ?>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php else:?>
 TBA
<?php endif;?>


                <table>
                  <tr><td valign=top><b>Mail </b>: <td>
                    Dipartimento di Matematica e Fisica<br>
                    Universit&agrave; Cattolica del Sacro Cuore<br>
                    Via Trieste, 17<br>
                    25121 Brescia, Italy<br>
		  <tr><td valign=top><b>Room </b>: <td>
                    "Ufficio dottorandi in Matematica"<br>
                  <tr><td valign=top><b>Phone </b>: <td>
                    +39 - 030.2406.715<br>
		  <tr><td valign=top><b>E-mail </b>: <td>
                    <A HREF="mailto:am.miti@dmf.unicatt.it">am.miti@dmf.unicatt.i
t</A><br>
                  <tr><td><b>Orario di ricevimento </b>: <td>
                    [...]<br>
             </table>


<h1>Stuff </h1>
<?php
  $papers = array();
  $teaching = array();
  $postgrad = array();

  if (($handle = fopen("material.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
 	$record = array(
	  "Category" => $data[0],
	  "Title" => $data[1],
	  "Type" => $data[2],
	  "Language" => $data[3],
	  "Date" => $data[4],
	  "Url" => $data[5],
	  "Wip" => $data[6],
	  "Authors" => $data[7],
	);
	if(strcmp($record["Category"],"Teaching")==0)
	  array_push($teaching,$record);
	else if(strcmp($record["Category"],"Paper")==0)
	  array_push($papers,$record);
	else if($record["Category"]=="Postgraduate")
	  array_push($postgrad,$record);
      
  }
  fclose($handle);
}
?>

<?php if (count($papers) > 0): ?>
<table>
  <tbody>
<?php foreach ($papers as $row): array_map('htmlentities', $row); ?>
    <tr>
      <?php 
	if ($row["Wip"]==1)
	 echo "<td> WIP </td>";
	echo "<td><a href=" . $row["Url"] . ">" . $row["Title"] . "</a> ;</td>";
	echo "<td>" . $row["Authors"] . "</td>";
      ?>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php else:?>
 TBA
<?php endif;?>


<?php if (count($teaching) > 0): ?>
<table>
  <tbody>
<?php foreach ($teaching as $row): array_map('htmlentities', $row); ?>
    <tr>
      <?php 
	if ($row["Wip"]==1)
	 echo "<td> WIP </td>";
	echo "<td><a href=" . $row["Url"] . ">" . $row["Title"] . "</a></td>";
	echo "<td>" . $row["Type"] . "</td>";
      ?>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php else:?>
 TBA
<?php endif;?>


<?php if (count($postgrad) > 0): ?>
<table>
  <tbody>
<?php foreach ($postgrad as $row): array_map('htmlentities', $row); ?>
    <tr>
      <?php 
	if ($row["Wip"]==1)
	 echo "<td> WIP </td>";
	echo "<td><a href=" . $row["Url"] . ">" . $row["Title"] . "</a></td>";
	echo "<td>" . $row["Type"] . "</td>";
      ?>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php else:?>
 TBA
<?php endif;?>
