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
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
font-size:0.5em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#ffffff;
}
#customers tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
{
table-layout:auto;
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

?>

<body>
 Stuff under here <br>
 
 <?php
//$directory = 'upload';
//$scanned_directory = array_diff(scandir($directory), array('..', '.'));
//print_r($scanned_directory);
$fdirectory = scandir("upload");
print_r(scandir("upload"));
?>

<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';

$filenames = array('upload/example2.xlsx', 'upload/example2b.xlsx', 'upload/example2c.xlsx');

$bigExcel = new PHPExcel();
$bigExcel->removeSheetByIndex(0);

$reader = new PHPExcel_Reader_Excel2007();

foreach ($filenames as $filename) {
    switch ($filename) {
        case 'example2.xlsx':        $loadSheetsOnly = array('RESTOWS-2011');    break;
        case 'example2b.xlsx':        $loadSheetsOnly = array('RESTOWS-2011');    break;
        case 'example2c.xlsx':        $loadSheetsOnly = array('RESTOWS-2011');     break;
    }
    
    $reader->setReadDataOnly(true);
    $reader->setLoadSheetsOnly($loadSheetsOnly);
    $excel = $reader->load($filename);

    foreach ($excel->getAllSheets() as $sheet) {
        $bigExcel->addExternalSheet($sheet);
    }
}

$writer = new PHPExcel_Writer_Excel2007($bigExcel);
$writer->save('2007-write.xlsx');
echo '<hr /><br>';
echo 'success';


?>
<body>
</html>