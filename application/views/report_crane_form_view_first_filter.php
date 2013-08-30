 <?php
 error_reporting(E_ALL);
ignore_user_abort();
ini_set("max_execution_time", "900"); 
ini_set('output_buffering', 0);
ini_set('implicit_flush', 1);
ob_end_flush();
ob_start();

$directory3 = 'crane_uploads';
$fileArray3 = scandir($directory3);

$inputFileNames3 = array_slice($fileArray3, 2);

echo 'This is the start of the first filter '. '<br>';
ob_flush(); flush();


function test_alter3(&$item13, $key3, $prefix3)
{
    $item13 = "$prefix3$item13";
}

array_walk($inputFileNames3, 'test_alter3', 'crane_uploads/');


/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

/** PHPExcel_IOFactory */
include '././excel/Classes/PHPExcel/IOFactory.php';

$tableHeader = 0;
$message = 0;

$rowCounter3 = 0; 
$optional =0;
class MyReadFilter3 implements PHPExcel_Reader_IReadFilter 
{ 
    public function readCell($column, $row, $worksheetName = '') { 
      
        if ($row >= 9 && $row <= 60) { 
            if (in_array($column,range('A', 27))) { 
            
                return true; 
            } 
        } 
        return false; 
    } 
} 

////////////////////////////////////////////////////////////////////////////////////////////
$filekey3 = 0; //this is the filekey starter
$folderNum3 = 0;
$sheetname = 'crane split';

foreach ($inputFileNames3 as $inputFileName3) {
////////////////////////////////////////////////////////////////////////////////////////////
//IDENTIFY FILE TYPE
$inputFileType3 = PHPExcel_IOFactory::identify($inputFileName3);

$filterSubset3 = new MyReadFilter3(); 

$objReader3 = PHPExcel_IOFactory::createReader($inputFileType3);

$objReader3->setReadDataOnly(true);
$objReader3->setLoadSheetsOnly($sheetname);
//$objReader->setSheetIndex(0);
//echo 'Loading Sheet using filter' . '<br>'; 
//ob_flush(); flush();
$objReader3->setReadFilter($filterSubset3); 

//echo 'Error yet?' . '<br>';
//ob_flush(); flush();
$objPHPExcel3 = $objReader3->load($inputFileName3);
	
//echo 'NO ERROR OMFG!!!' . '<br>';	
// ob_flush(); flush();   
echo "Im reading file " . '<b>'. "$inputFileName3" . '</b>'. '<br>';
ob_flush(); flush();
$objWorksheet4 = $objPHPExcel3->getActiveSheet();
//$objWorksheet2->removeRow(126, 128);

/*
for ($row2 = 100; $row2 <= 128; ++$row2) {
//if ($objWorksheet->getCellByColumnAndRow($col='B', $row)->getValue() != NULL){

  for ($col2 = 1; $col2 < 2; ++$col2) {
  //if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    if ($objWorksheet3->getCellByColumnAndRow($col2, $row2)->getValue() == NULL){
      $objWorksheet3->removeRow($row2, 128);
      $rowCounter2++; 
      
    }

  }

}
*/
$numDataCells2 = (60 - $rowCounter3);

echo "Read " . '<font color=red>'. $numDataCells2 . '</font>'.' rows ' . " from the file $inputFileName3" . '<br>';
ob_flush(); flush();
$xlsWriter3 = new PHPExcel_Writer_CSV($objPHPExcel3);
$xlsWriter3->setPreCalculateFormulas(false);
$xlsWriter3->setSheetIndex(0);
$xlsWriter3->setUseBOM(true);
//you could write a loop to create directories first too
$xlsWriter3->save("././crane_uploads_csv/$inputFileName3.csv");

$filekey3++; //initialized at inputFileNames above... big loop
$rowCounter3 = 0; //reset to 0 once done reading lines for file
unset($objPHPExcel3); 
$folderNum3++;
set_time_limit(360); 
} //inputFiles
echo "THIS IS THE END OF THE FIRST PASS FILTER" . '<br><br>'; 
ob_flush(); flush();
?>
