<?php
/* =============================================================
/   * CSV Viewer
	* Version 1.0 (05/07/2017)
	*
	* This application loads and parses a CSV file in the HTML format for browser viewing.
	* Optionally the user can set a password in the configuration and then enter it using a GET request:
	* Example: www.mysite.com/csvlogview.php?Password=mypassword
	*
	* Developed by Daniel Brooke Peig - daniel@danbp.org
	* http://www.danbp.org
	* Copyright 2017 - Daniel Brooke Peig
	*
	* This software is distributed under the MIT License.
	* Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
	*
	* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	*
	* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
	*
	*
/* =============================================================*/

/* =============================================================
 * CSV Viewer
 * Versione modificata per aprire due file CSV
 * =============================================================*/

//------------------------------------------------
// Configuration
//
$fileNames = array(
	"./activities.csv",
	"./activities_2.csv"
); // CSV files location

$delimiter = ";"; // CSV delimiter character: , ; /t
$enclosure = '"'; // CSV enclosure character: " '
$password = ''; // Optional password
$ignorePreHeader = 3; // Number of characters to ignore before the table header
//------------------------------------------------


// Funzione che genera la tabella HTML a partire da un file CSV
function generateCsvTable($fileName, $delimiter, $enclosure, $ignorePreHeader) {

	$tableOutput = "<h2>" . htmlspecialchars($fileName) . "</h2>";

	if(file_exists($fileName)) {

		// Reads lines of file to array
		$fileLines = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

		// Not empty file
		if($fileLines !== array()) {

			// Extract the existing header from the file
			$lineHeader = array_shift($fileLines);
			$logOriginalHeader = array_map(
				'trim',
				str_getcsv(substr($lineHeader, $ignorePreHeader), $delimiter, $enclosure)
			);

			// Process the file only if the system could find a valid header
			if(count($logOriginalHeader) > 0) {

				$tableOutput .= "<TABLE style='min-width: 50%;'>";

				// Print the table header
				$tableOutput .= "<TR style='background-color: lightgray;text-align:center;'>";
				$tableOutput .= "<TD><B>Row</B></TD>";

				foreach ($logOriginalHeader as $field) {
					$tableOutput .= "<TD><B>" . htmlspecialchars($field) . "</B></TD>";
				}

				$tableOutput .= "</TR>";

				// Get each line of the array and print the table rows
				$countLines = 0;

				foreach ($fileLines as $line) {
					if(trim($line) !== '') {

						$countLines++;

						$arrayFields = array_map(
							'trim',
							str_getcsv($line, $delimiter, $enclosure)
						);

						$tableOutput .= "<TR>";
						$tableOutput .= "<TD style='background-color: lightgray;'>" . $countLines . "</TD>";

						foreach ($arrayFields as $field) {
							$tableOutput .= "<TD>" . htmlspecialchars($field) . "</TD>";
						}

						$tableOutput .= "</TR>";
					}
				}

				// Print the table footer
				$tableOutput .= "<TR style='background-color: lightgray;text-align:center;'>";
				$tableOutput .= "<TD><B>Row</B></TD>";

				foreach ($logOriginalHeader as $field) {
					$tableOutput .= "<TD><B>" . htmlspecialchars($field) . "</B></TD>";
				}

				$tableOutput .= "</TR>";

				// Close the table tag
				$tableOutput .= "</TABLE>";

				// Download link
				$tableOutput .= "<p><a href='" . htmlspecialchars($fileName) . "'>Download " . htmlspecialchars($fileName) . "</a></p>";
			}
			else {
				$tableOutput .= "<b>Invalid data format</b>";
			}
		}
		else {
			$tableOutput .= "<b>Empty file</b>";
		}
	}
	else {
		$tableOutput .= "<b>File not found</b>";
	}

	return $tableOutput;
}


// Variable initialization
$tableOutput = "<b>No data loaded</b>";

// Verify the password, if set
if(isset($_GET["Password"]) && $_GET["Password"] === $password || $password === "") {

	$tableOutput = "";

	foreach ($fileNames as $fileName) {
		$tableOutput .= generateCsvTable($fileName, $delimiter, $enclosure, $ignorePreHeader);
		$tableOutput .= "<hr>";
	}

}
else {
	$tableOutput = "<b>Invalid password.</b> Enter the password using this URL format: "
		. $_SERVER['HTTP_HOST']
		. $_SERVER['REQUEST_URI']
		. "?Password=<b>your_password</b>";
}

?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="../img/terminal.ico" type="image/x-icon">
<link rel="icon" href="../img/terminal.ico" type="image/x-icon">

<head>
<meta charset="UTF-8">
<title>Resume-CSV</title>
</head>

<body>

<h1>Php generated Resume - CSV Viewer</h1>

<a name="top"></a>

<hr>

<table style="width:50%">
	<tr>
		<td><a href="" onClick="location.reload()">Refresh</a></td>
		<td><a href="#bottom">End</a></td>
	</tr>
</table>

<hr>

<?=$tableOutput ?>

<a name="bottom"></a>

<hr>

<table style="width:50%">
	<tr>
		<td><a href="" onClick="location.reload()">Refresh</a></td>
		<td><a href="#top">Top</a></td>
	</tr>
</table>

<hr>

</body>
</html>