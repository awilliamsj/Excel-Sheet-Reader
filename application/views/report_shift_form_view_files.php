<?php
error_reporting(E_ALL);
ignore_user_abort();
ini_set('output_buffering', 0);
ini_set('implicit_flush', 1);

$directory2 = 'shift_uploads_csv/shift_uploads/';
$fileArray2 = scandir($directory2);

$inputFileNames2 = array_slice($fileArray2, 2);

echo 'This is the start of the second filter '. '<br>';
ob_flush(); flush();
function test_alter2(&$item12, $key2, $prefix2)
{
    $item12 = "$prefix2$item12";
}

array_walk($inputFileNames2, 'test_alter2', 'shift_uploads_csv/shift_uploads/');

/*
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');


include '././excel/Classes/PHPExcel/IOFactory.php';
*/

$tableHeader = 0;
$message = 0;

$rowCounter2 = 0; 
$optional =0;
class MyReadFilter2 implements PHPExcel_Reader_IReadFilter 
{ 
    public function readCell($column, $row, $worksheetName = '') { 
      
        if ($row >= 1 && $row <= 1000) { 
            if (in_array($column,range('A', 27))) { 
            
                return true; 
            } 
        } 
        return false; 
    } 
} 

////////////////////////////////////////////////////////////////////////////////////////////
$filekey2 = 0; //this is the filekey starter
$folderNum = 0;

foreach ($inputFileNames2 as $inputFileName2) {
////////////////////////////////////////////////////////////////////////////////////////////
//IDENTIFY FILE TYPE
$inputFileType2 = PHPExcel_IOFactory::identify($inputFileName2);

$filterSubset2 = new MyReadFilter2(); 

$objReader2 = PHPExcel_IOFactory::createReader($inputFileType2);

//$objReader2->setReadDataOnly(true);
//$objReader2->setLoadSheetsOnly(array(0));
//$objReader->setSheetIndex(0);
//echo 'Loading Sheet using filter' . '<br>'; 

$objReader2->setReadFilter($filterSubset2); 

//echo 'Error yet?' . '<br>';

$objPHPExcel2 = $objReader2->load($inputFileName2);
	
//echo 'NO ERROR OMFG!!!' . '<br>';	
    
echo "Im reading file " . '<b>' . "$inputFileName2" .'</b>' . '<br>';
ob_flush(); flush();
$objWorksheet3 = $objPHPExcel2->getActiveSheet();
//$objWorksheet2->removeRow(126, 128);

/*
for ($row2 = 1; $row2 <= 500; ++$row2) {
//if ($objWorksheet->getCellByColumnAndRow($col='B', $row)->getValue() != NULL){

  for ($col2 = 1; $col2 < 2; ++$col2) {
  //if ($objWorksheet->getCellByColumnAndRow($col, $row)->getValue() != NULL){
    if ($objWorksheet3->getCellByColumnAndRow($col2, $row2)->getValue() == NULL){
      $objWorksheet3->removeRow($row2, 500);
      $rowCounter2++; 
      
    }

  }

}
*/
$row2 = 3; //VSL check this to mean 4
$col2 = 1; //VSL column

while ($objWorksheet3->getCellByColumnAndRow($col2, $row2)->getValue() !== NULL){
//echo "I'm in the while loop" . '<br>';
//echo "The row counter is at " . $rowCounter2 . '<br>';
//echo $objWorksheet3->getCellByColumnAndRow($col2, $row2)->getValue() . '<br>';
$rowCounter2++;
$row2++;
}

$numDataCells = ($rowCounter2 - 1);

echo "Read " . '<font color=red>'. $numDataCells . '</font>' . ' rows ' . " from the file $inputFileName2" . '<br>';
ob_flush(); flush();
$xlsWriter2 = new PHPExcel_Writer_CSV($objPHPExcel2);
$xlsWriter2->setUseBOM(true);
//you could write a loop to create directories first too
$xlsWriter2->save("././filecounter/$folderNum/$numDataCells");

$filekey2++; //initialized at inputFileNames above... big loop
$rowCounter2 = 0; //reset to 0 once done reading lines for file
unset($objPHPExcel2); 
$folderNum++;
} //inputFiles
echo "THIS IS THE END OF THE SECOND PASS FILTER" . '<br><br>'; 
//echo "THE ROW COUNTER ENDED UP AT $rowCounter2 " . '<br><br>';
ob_end_flush();
ob_start();
?>
