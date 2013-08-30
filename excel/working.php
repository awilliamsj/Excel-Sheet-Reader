<?php

error_reporting(E_ALL);
set_time_limit(0);

date_default_timezone_set('Europe/London');

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Examples</title>
<style type="text/css">
table.ex2 {table-layout:fixed}
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
font-size:0.5em;
border:0px solid #98bf21;
padding:3px 7px 2px 7px;
table-layout:auto;
}
#customers th 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:yellow;
color:#ffffff;
}
#customers tr.alt td 
{
font-size:0.7em;
color:#000000;
background-color:yellow; 
}
</style>
</head>

<?php
//phpinfo();

//  $inputFileType = 'Excel5';
//  $inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
//	$inputFileType = 'Gnumeric';
//print_r(scandir("upload"));
?>

<body>
 Stuff under here <br>
 
 <?php
$directory = 'upload';
$fileArray = scandir($directory);
print_r($fileArray);
echo sizeof($fileArray);
echo '<br>';
echo 'Now look!' . '<br>';
$inputFileNames = array_slice($fileArray, 2);
print_r($inputFileNames);
echo sizeof($inputFileNames);

echo '<br>';
for ($key = 0; $key < sizeof($inputFileNames); ++$key) {
//echo "upload/{$inputFileNames['key']}";
	echo "\$key = ".$key." and \$value = ". $inputFileNames[$key];
	echo '<br>';

}
echo '<br>';
print_r($inputFileNames);
print_r($string);
echo '<br>';

//$fruits = array("a" => "lemon", "b" => "orange", "c" => "banana", "d" => "apple");

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix$item1";
}

function test_print($item2, $key)
{
    echo "$key. $item2<br />\n";
}

echo "Before ...:\n";
echo '<br>';
array_walk($inputFileNames, 'test_print');

array_walk($inputFileNames, 'test_alter', 'upload/');
echo "... and after:\n";
echo '<br>';
array_walk($inputFileNames, 'test_print');


?>
<br>
<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';

////////////////////////////////////////////////////////////////////////////////////////////
//$inputFileName = 'upload/example2b.xlsx';
//$inputFileNames = array('upload/example2.xlsx','upload/example2b.xlsx','upload/example2c.xlsx');
$sheetname = 'RESTOWS-2011';
$tableHeader = 0;

echo '<table id="customers" class"ex1">' . "\n";
////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////

/**  Define a Read Filter class implementing PHPExcel_Reader_IReadFilter  */
class chunkReadFilter implements PHPExcel_Reader_IReadFilter
{
	private $_startRow = 0;

	private $_endRow = 0;

	/**  Set the list of rows that we want to read  */
	public function setRows($startRow, $chunkSize) {
		$this->_startRow	= $startRow;
		$this->_endRow		= $startRow + $chunkSize;
	}

	public function readCell($column, $row, $worksheetName = '') {
		//  Only read the heading row, and the rows that are configured in $this->_startRow and $this->_endRow
		//if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) {
		if ($row >= $this->_startRow && $row < $this->_endRow) {
			//if ($row >= 1 && $row <= 7) {
        if (in_array(PHPExcel_Cell::columnIndexFromString($column),range(PHPExcel_Cell::columnIndexFromString('A'),
        PHPExcel_Cell::columnIndexFromString('AB')))) {
			return true;
		} } //}
		return false;
	}
} //end chunkReadFilter

////////////////////////////////////////////////////////////////////////////////////////////

foreach ($inputFileNames as $inputFileName) {
////////////////////////////////////////////////////////////////////////////////////////////
//IDENTIFY FILE TYPE
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//echo 'File ',pathinfo($inputFileName,PATHINFO_BASENAME),' has been identified as an ',$inputFileType,' file<br />';

//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with the identified reader type<br />';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
//LOAD FILE
////////////////////////////////////////////////////////////////////////////////////////////
//echo '<hr />';

////////////////////////////////////////////////////////////////////////////////////////////
//LOAD ONLY DATA AND SHEET NAME
$objReader->setReadDataOnly(true);
$objReader->setLoadSheetsOnly($sheetname);
////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////
/**  Define how many rows we want to read for each "chunk"  **/

$chunkSize = (256) ;
/**  Create a new Instance of our Read Filter  **/
$chunkFilter = new chunkReadFilter();

/**  Tell the Reader that we want to use the Read Filter that we've Instantiated  **/
$objReader->setReadFilter($chunkFilter);

/**  Loop to read our worksheet in "chunk size" blocks  **/
for ($startRow = 2; $startRow <= (256); $startRow += $chunkSize) {
	//echo 'Loading WorkSheet using configurable filter for headings row 1 and for rows ',$startRow,' to ',($startRow+$chunkSize-1),'<br />';
	/**  Tell the Read Filter, the limits on which rows we want to read this iteration  **/
	$chunkFilter->setRows($startRow,$chunkSize);
	/**  Load only the rows that match our filter from $inputFileName to a PHPExcel Object  **/

	$objPHPExcel = $objReader->load($inputFileName);
////////////////////////////////////////////////////////////////////////////////////////////

	//	Do some processing here

//$objWriter = new PHPExcel_Writer_HTML($objPHPExcel);
//echo $objWriter->generateSheetData();	

////////////////////////////////////////////////////////////////////////////////////////////
//HTML TABLE LOOP
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5

//echo '<table id="customers" class"ex1">' . "\n";

if ($tableHeader == 0) {
for ($row = 4; $row < 5; ++$row) {

echo '<tr class="alt">' . "\n";

  for ($col = 1; $col <= $highestColumnIndex; ++$col) {
  if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    echo '<td>' . $objWorksheet->getCellByColumnAndRow($col, $row)->getValue() . '</td>' . "\n";
  }
  }
  $tableHeader = 1;

  echo '</tr>' . "\n";
}
} //end if

for ($row = 5; $row <= $highestRow; ++$row) {
//if ($objWorksheet->getCellByColumnAndRow($col='B', $row)->getValue() != NULL){

  echo '<tr>' . "\n";

  for ($col = 1; $col <= $highestColumnIndex; ++$col) {
  if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    echo '<td>' . $objWorksheet->getCellByColumnAndRow($col, $row)->getValue() . '</td>' . "\n";
  }
  }

  echo '</tr>' . "\n";
//} 
}

//echo '</table>' . "\n";
////////////////////////////////////////////////////////////////////////////////////////////

	//$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//var_dump($sheetData);
	//echo '<br /><br />';
	
	
} //load inputFiles
} //inputFiles

echo '</table>' . "\n";
?>
<body>
</html>