<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script type="text/javascript">
<!--
function confirmation() {
  //var answer = confirm("Are you sure you want to download this!?!?!?")
	//if (answer){
			window.location = "/index.php/report_shift_form_controller/download_shift";
	//}

}
//-->
</script>

<form>
<input type="button" value="Download CSV" onClick="confirmation();" />
</form>

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

<?php
//phpinfo();

//  $inputFileType = 'Excel5';
//  $inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
//	$inputFileType = 'Gnumeric';
//print_r(scandir("upload"));

//$file=fopen("csvexports/shiftingreport2.csv","w");

?>
<body>
 
 <?php
error_reporting(E_ALL);
ignore_user_abort();
ini_set('output_buffering', 0);
ini_set('implicit_flush', 1); 

 
$directory = 'shift_uploads';
$fileArray = scandir($directory);
//print_r($fileArray);
//echo sizeof($fileArray);
echo '<br>';
//echo 'Now look!' . '<br>';
$inputFileNames = array_slice($fileArray, 2);
//print_r($inputFileNames);
echo 'Generated compiled report from ' . sizeof($inputFileNames) . ' sheet(s)' . '<br>';
//echo sizeof($inputFileNames);

//echo '<br>';
//for ($key = 0; $key < sizeof($inputFileNames); ++$key) {
//echo "upload/{$inputFileNames['key']}";
//	echo "\$key = ".$key." and \$value = ". $inputFileNames[$key];
//	echo '<br>';

//}
//echo '<br>';
//print_r($inputFileNames);

//echo '<br>';

//$fruits = array("a" => "lemon", "b" => "orange", "c" => "banana", "d" => "apple");

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix$item1";
}

/*function test_print($item2, $key)
{
    echo "$key. $item2<br />\n";
}

echo "Before ...:\n";
echo '<br>';
array_walk($inputFileNames, 'test_print');
*/

array_walk($inputFileNames, 'test_alter', 'shift_uploads/');
//echo "... and after:\n";
//echo '<br>';
//array_walk($inputFileNames, 'test_print');

?>
<br>
<?php

/** Include path **/
//set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

/** PHPExcel_IOFactory */
//include '././excel/Classes/PHPExcel/IOFactory.php';

////////////////////////////////////////////////////////////////////////////////////////////
//$inputFileName = 'upload/example2b.xlsx';
//$inputFileNames = array('upload/example2.xlsx','upload/example2b.xlsx','upload/example2c.xlsx');
//$sheetname = 'RESTOWS-2011';
$tableHeader = 0;
$message = 0;

//$rowCounter = 0; 
//$numDataCells = (128 - $rowCounter);
//echo 'Row counter is at ' . $rowCounter . ' and number of rows total is ' . $numDataCells . '<br>';	


echo '<table id="customers" class"ex1">' . "\n";
////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////
//READ NUMBER OF LINES
////////////////////////////////////////////////////////////////////////////////////////////

for ($me = 0; $me < sizeof($inputFileNames); $me++){ //changed from 11 to size of array
$directoryCounter[$me] = "filecounter/$me";
$fileCounting = scandir($directoryCounter[$me]);

$readLimit[$me] = array_slice($fileCounting, 2);
echo 'File #' . $me . ' has ' . $readLimit[$me][0] . ' lines.' . '<br>';
}
echo '<br>';
//echo $readLimit[0][0];
//echo $readLimit[1][0];
//echo $readLimit[2][0];
////////////////////////////////////////////////////////////////////////////////////////////
//END READ NUMBER OF LINES
////////////////////////////////////////////////////////////////////////////////////////////

$works = 0;




////////////////////////////////////////////////////////////////////////////////////////////

/**  Define a Read Filter class implementing PHPExcel_Reader_IReadFilter  */

class MyReadFilter implements PHPExcel_Reader_IReadFilter
{ 
    /*
    public function limiter($Limit){
    if ($Limit == 10){
        echo $Limit;
        }
    }
    */
    private $_startRow = 0; 
    private $_endRow   = 0; 

    /**  Set the list of rows that we want to read  */ 
    public function setRows($startRow, $chunkSize) { 
        $this->_startRow = $startRow; 
        $this->_endRow   = $chunkSize; 
    } 
    
    
    public function readCell($column, $row, $worksheetName ='') { 
        //  Read rows 1 to 7 and columns A to E only 

        if ($row >= 1 && $row <= $this->_endRow) { 
            if (in_array($column,range('A', 27))) { 
                //$row <= 128
               // if ($column['F'] == "RRB003"){
                return true; 
             //  }
             
            } 
        } 
        return false; 
    }
    
} 

////////////////////////////////////////////////////////////////////////////////////////////
$filekey = 0; //this is the filekey starter


foreach ($inputFileNames as $inputFileName) {
////////////////////////////////////////////////////////////////////////////////////////////
//IDENTIFY FILE TYPE
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//echo 'File ',pathinfo($inputFileName,PATHINFO_BASENAME),' has been identified as an ',$inputFileType,' file<br />';

//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with the identified reader type<br />';
//$objReader = PHPExcel_IOFactory::createReader($inputFileType);
//LOAD FILE
////////////////////////////////////////////////////////////////////////////////////////////
//echo '<hr />';

////////////////////////////////////////////////////////////////////////////////////////////
//LOAD ONLY DATA AND SHEET NAME

//$objReader->setLoadSheetsOnly(array(0)); //reads the first sheet
////////////////////////////////////////////////////////////////////////////////////////////
/**  Define a Read Filter class implementing PHPExcel_Reader_IReadFilter  */ 

$chunkSize = $readLimit[$works][0];
$startRow = 1;
/**  Create an Instance of our Read Filter  **/ 
$filterSubset = new MyReadFilter(); 
/** Create a new Reader of the type defined in $inputFileType **/
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
/**  Advise the Reader of which WorkSheets we want to load 
     It's more efficient to limit sheet loading in this manner rather than coding it into a Read Filter  **/ 
$objReader->setReadDataOnly(true);
$objReader->setLoadSheetsOnly(array(0));
//$objReader->setSheetIndex(0);
//echo 'Loading Sheet using filter' . '<br>'; 
/**  Tell the Reader that we want to use the Read Filter that we've Instantiated  **/ 
//$filterSubset->limiter($Limit);
$objReader->setReadFilter($filterSubset);
$filterSubset->setRows($startRow,$chunkSize); 

//$objWorksheet2 = $objPHPExcel->getActiveSheet();
//$objWorksheet2->getCellByColumnAndRow($col, $row)->getValue();
/**  Load only the rows and columns that match our filter from $inputFileName to a PHPExcel Object  **/

////////////////////////////////////////////////////////////////////////////////////////////
/**  Define how many rows we want to read for each "chunk"  **/

//echo 'Error yet?' . '<br>';

	$objPHPExcel = $objReader->load($inputFileName);
	
//echo 'NO ERROR OMFG!!!' . '<br>';	
    
echo "Im reading file $inputFileName" . ' using filters ' . '<br>';

//echo "The Limit is set to $Limit" . '<br>';

$objWorksheet2 = $objPHPExcel->getActiveSheet(); //is this useful? pobably not
//$objWorksheet2->removeRow(126, 128);

/*
for ($row2 = 100; $row2 <= 128; ++$row2) {
//if ($objWorksheet->getCellByColumnAndRow($col='B', $row)->getValue() != NULL){

  for ($col2 = 1; $col2 < 2; ++$col2) {
 // if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    if ($objWorksheet2->getCellByColumnAndRow($col2, $row2)->getValue() == NULL){
      $objWorksheet2->removeRow($row2, 128);
      //$rowCounter++; 
      
    }
//  }
  }
//} 
}
*/
////////////////////////////////////////////////////////////////////////////////////////////	
	// Write the spreadsheet file...
  //$worksheet = $objReader->setLoadSheetsOnly(array(0));
 
  //$objReader = new PHPExcel_Reader_Excel5();
  //$objReader->setReadFilter( new MyReadFilter() );$objPHPExcel = $objReader->load("06largescale.xls");


  //$objWorksheet = $objPHPExcel->getActiveSheet();
  //$sheet1 = $xlsTemplate->getSheetByName('Sheet1');
  //$xls->addExternalSheet($sheet1,0);
  //$xls->removeSheetByIndex(0);
  $xlsWriter = new PHPExcel_Writer_CSV($objPHPExcel);
  $xlsWriter->setUseBOM(true);
 $xlsWriter->save("././csvexports/$filekey.csv");
  
  
  $filekey++; //initialized at inputFileNames above... big loop


	//$objWriter = new PHPExcel_Writer_CSV($objPHPExcel);$objWriter->setUseBOM(true);
	//$objWriter->save("././csvexports/shiftingreport2.csv");
	
//$objWriter = new PHPExcel_Writer_CSV($objPHPExcel);$objWriter->setUseBOM(true);
//$objWriter->save("././csvexports/shiftingreport2.csv");	
	
////////////////////////////////////////////////////////////////////////////////////////////

	//	Do some processing here

//$objWriter = new PHPExcel_Writer_HTML($objPHPExcel);
//echo $objWriter->generateSheetData();	

////////////////////////////////////////////////////////////////////////////////////////////
//HTML TABLE LOOP
/*

$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5

//echo '<table id="customers" class"ex1">' . "\n";

if ($tableHeader == 0) {
for ($row = 4; $row < 5; ++$row) {

echo '<tr class="alt">' . "\n";

  for ($col = 1; $col <= $highestColumnIndex; ++$col) {
  //if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    echo '<td>' . $objWorksheet->getCellByColumnAndRow($col, $row)->getValue() . '</td>' . "\n";
 // }
  }
  $tableHeader = 1;

  echo '</tr>' . "\n";
}
} //end if

for ($row = 5; $row <= $highestRow; ++$row) {
//if ($objWorksheet->getCellByColumnAndRow($col='B', $row)->getValue() != NULL){

  echo '<tr>' . "\n";

  for ($col = 1; $col <= $highestColumnIndex; ++$col) {
 // if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    echo '<td>' . $objWorksheet->getCellByColumnAndRow($col, $row)->getValue() . '</td>' . "\n";
//  }
  }

  echo '</tr>' . "\n";
//} 
}

//echo '</table>' . "\n";
*/
////////////////////////////////////////////////////////////////////////////////////////////

	//$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//var_dump($sheetData);
	//echo '<br /><br />';
	
	unset($objPHPExcel); 

//} //load inputFiles

  //$objPHPExcel->disconnectWorksheets(); 
echo '<br>';    
$works++;
//echo $works;
 set_time_limit(240); 
} //inputFiles
 //echo '</table>' . "\n";

ob_end_flush();
ob_start();
  

?>
<body>
</html>