<style type="text/css">
table.ex2 {table-layout:fixed}
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:90%;
border-collapse:collapse;
}
#customers td, #customers th 
{
font-size:1.0em;
border:1px solid #e5edf0;
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
font-size:1.0em;
color:#000000;
background-color:yellow; 
}
</style>

<script type="text/javascript">
function popup(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=1440,left = 510,top = -180');");
}
</script>

<?php
//phpinfo();

$directory = 'shift_uploads';
$fileArray = scandir($directory);
//print_r($fileArray);
$slicedFiles = array_slice($fileArray, 2);
//print_r($slicedFiles);
//echo sizeof($slicedFiles);
//echo readdir($slicedFiles);

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix$item1";
}
array_walk($slicedFiles, 'test_alter', 'shift_uploads/');
/////////////////////////////////////////////////////////////////////////////////
$directory2 = 'crane_uploads';
$fileArray2 = scandir($directory2);
//print_r($fileArray);
$slicedFiles2 = array_slice($fileArray2, 2);
//print_r($slicedFiles);
//echo sizeof($slicedFiles);
//echo readdir($slicedFiles);

function test_alter2(&$item1b, $keyb, $prefixb)
{
    $item1b = "$prefixb$item1b";
}
array_walk($slicedFiles2, 'test_alter2', 'crane_uploads/');


date_default_timezone_set('America/Panama');

/*
for ($key = 0; $key < sizeof($slicedFiles); ++$key) {
echo "upload/{$inputFileNames['key']}";
	echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$key])));
	echo '<br>';

}
*/
//print_r($slicedFiles);
echo 'Instructions: All files must be named [MSKID]shifting.xlsx or [MSKID]cranesplit.xlsx.';
echo '<br>';
echo 'Ex: mfl031shifting.xlsx or mfl031cranesplit.xlsx.';
echo '<br>';

$mskIDs = array("MFL031", "AVI069", "RRB003", "ALO063", 
                 "JDL021", "EAL029","JLA131", "AHE083", 
                 "JBA101", "LCA104", "OPO015");

echo '<br>';

echo '<table id="customers" class"ex1">' . "\n";

echo '<tr>' . "\n";
echo '<td><b>' . "" .  '</td>' . "\n";
echo '<td><b>' . "Shifting File Submissions" .  '</td>' . "\n";
echo '<td><b>' . "" .  '</td>' . "\n";
echo '<td><b>' . "Cranesplit File Submissions" .'</td>' . "\n";
echo '<td><b>' . "" .  '</td>' . "\n";
echo '</tr>' . "\n";

echo '<tr>' . "\n";
echo '<td><b>' . " MSK ID " .  '</td>' . "\n";
echo '<td><b>' . " File Uploaded? " .  '</td>' . "\n";
echo '<td><b>' . " Timestamp " .'</td>' . "\n";
echo '<td><b>' . " File Uploaded? " .  '</td>' . "\n";
echo '<td><b>' . " Timestamp " .'</td>' . "\n";
echo '</tr>' . "\n";

for ($row = 0; $row < 11; ++$row) {
//if ($objWorksheet->getCellByColumnAndRow($col='B', $row)->getValue() != NULL){

  echo '<tr>' . '<td>' .$mskIDs[$row] . '</td>'. "\n";

echo '<td>' . "\n";
  for ($col = 0; $col < 1; ++$col) {

/*
MFL031 = 0
AVI069 = 1
RRB003 = 2
ALO063 = 3
JDL021 = 4
EAL029 = 5
JLA131 = 6
AHE083 = 7
JBA101 = 8
LCA104 = 9
OPO015 = 10
*/
    if ($row == 0 && $searchKey = in_array('shift_uploads/mfl031shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
    else if ($row == 1 && $searchKey = in_array('shift_uploads/avi069shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
    else if ($row == 2 && $searchKey = in_array('shift_uploads/rrb003shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
    else if ($row == 3 && $searchKey = in_array('shift_uploads/alo063shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
     else if ($row == 4 && $searchKey = in_array('shift_uploads/jdl021shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
      else if ($row == 5 && $searchKey = in_array('shift_uploads/eal029shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
      else if ($row == 6 && $searchKey = in_array('shift_uploads/jla131shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
       else if ($row == 7 && $searchKey = in_array('shift_uploads/ahe083shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
       else if ($row == 8 && $searchKey = in_array('shift_uploads/jba101shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
       else if ($row == 9 && $searchKey = in_array('shift_uploads/lca104shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }
      else if ($row == 10 && $searchKey = in_array('shift_uploads/opo015shifting.xlsx', $slicedFiles)){
    echo ' Yes ' . "\n";
 }

  else {
    echo ' No ' . "\n";
  }
}
 echo '</td>' . "\n";
 
 echo '<td>' . "\n"; //begin third column
   for ($col = 0; $col < 1; ++$col) {

/*
MFL031 = 0
AVI069 = 1
RRB003 = 2
ALO063 = 3
JDL021 = 4
EAL029 = 5
JLA131 = 6
AHE083 = 7
JBA101 = 8
LCA104 = 9
OPO015 = 10
*/

    if ($row == 0 && $searchKey = in_array('shift_uploads/mfl031shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/mfl031shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
    else if ($row == 1 && $searchKey = in_array('shift_uploads/avi069shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/avi069shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
    else if ($row == 2 && $searchKey = in_array('shift_uploads/rrb003shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/rrb003shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
    else if ($row == 3 && $searchKey = in_array('shift_uploads/alo063shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/alo063shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
     else if ($row == 4 && $searchKey = in_array('shift_uploads/jdl021shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/jdl021shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
      else if ($row == 5 && $searchKey = in_array('shift_uploads/eal029shifting.xlsx', $slicedFiles)){
     $sKey = array_search('shift_uploads/eal029shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
      else if ($row == 6 && $searchKey = in_array('shift_uploads/jla131shifting.xlsx', $slicedFiles)){
     $sKey = array_search('shift_uploads/jla131shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
       else if ($row == 7 && $searchKey = in_array('shift_uploads/ahe083shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/ahe083shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
       else if ($row == 8 && $searchKey = in_array('shift_uploads/jba101shifting.xlsx', $slicedFiles)){
     $sKey = array_search('shift_uploads/jba101shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
       else if ($row == 9 && $searchKey = in_array('shift_uploads/lca104shifting.xlsx', $slicedFiles)){
    $sKey = array_search('shift_uploads/lca104shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }
      else if ($row == 10 && $searchKey = in_array('shift_uploads/opo015shifting.xlsx', $slicedFiles)){
     $sKey = array_search('shift_uploads/opo015shifting.xlsx', $slicedFiles);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles[$sKey])));
 }

  else {
    echo ' N/A ' . "\n";
  }
}
 echo '</td>' . "\n";
 
  echo '<td>' . "\n";
    for ($col = 0; $col < 1; ++$col) {

/*
MFL031 = 0
AVI069 = 1
RRB003 = 2
ALO063 = 3
JDL021 = 4
EAL029 = 5
JLA131 = 6
AHE083 = 7
JBA101 = 8
LCA104 = 9
OPO015 = 10
*/
    if ($row == 0 && $searchKey2 = in_array('crane_uploads/mfl031cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
    else if ($row == 1 && $searchKey2 = in_array('crane_uploads/avi069cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
    else if ($row == 2 && $searchKey2 = in_array('crane_uploads/rrb003cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
    else if ($row == 3 && $searchKey2 = in_array('crane_uploads/alo063cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
     else if ($row == 4 && $searchKey2 = in_array('crane_uploads/jdl021cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
      else if ($row == 5 && $searchKey2 = in_array('crane_uploads/eal029cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
      else if ($row == 6 && $searchKey2 = in_array('crane_uploads/jla131cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
       else if ($row == 7 && $searchKey2 = in_array('crane_uploads/ahe083cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
       else if ($row == 8 && $searchKey2 = in_array('crane_uploads/jba101cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
       else if ($row == 9 && $searchKey2 = in_array('crane_uploads/lca104cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }
      else if ($row == 10 && $searchKey2 = in_array('crane_uploads/opo015cranesplit.xlsx', $slicedFiles2)){
    echo ' Yes ' . "\n";
 }

  else {
    echo ' No ' . "\n";
  }
}
 echo '</td>' . "\n";


 echo '<td>' . "\n"; //begin third column
   for ($col = 0; $col < 1; ++$col) {

/*
MFL031 = 0
AVI069 = 1
RRB003 = 2
ALO063 = 3
JDL021 = 4
EAL029 = 5
JLA131 = 6
AHE083 = 7
JBA101 = 8
LCA104 = 9
OPO015 = 10
*/

    if ($row == 0 && $searchKey2 = in_array('crane_uploads/mfl031cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/mfl031cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
    else if ($row == 1 && $searchKey2 = in_array('crane_uploads/avi069cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/avi069cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
    else if ($row == 2 && $searchKey2 = in_array('crane_uploads/rrb003cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/rrb003cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
    else if ($row == 3 && $searchKey2 = in_array('crane_uploads/alo063cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/alo063cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
     else if ($row == 4 && $searchKey2 = in_array('crane_uploads/jdl021cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/jdl021cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
      else if ($row == 5 && $searchKey2 = in_array('crane_uploads/eal029cranesplit.xlsx', $slicedFiles2)){
     $sKey2 = array_search('crane_uploads/eal029cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
      else if ($row == 6 && $searchKey2 = in_array('crane_uploads/jla131cranesplit.xlsx', $slicedFiles2)){
     $sKey2 = array_search('crane_uploads/jla131cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
       else if ($row == 7 && $searchKey2 = in_array('crane_uploads/ahe083cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/ahe083cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
       else if ($row == 8 && $searchKey2 = in_array('crane_uploads/jba101cranesplit.xlsx', $slicedFiles2)){
     $sKey2 = array_search('crane_uploads/jba101cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
       else if ($row == 9 && $searchKey2 = in_array('crane_uploads/lca104cranesplit.xlsx', $slicedFiles2)){
    $sKey2 = array_search('crane_uploads/lca104cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }
      else if ($row == 10 && $searchKey2 = in_array('crane_uploads/opo015cranesplit.xlsx', $slicedFiles2)){
     $sKey2 = array_search('crane_uploads/opo015cranesplit.xlsx', $slicedFiles2);
    echo date('m/d/Y - h:iA T',(filemtime($slicedFiles2[$sKey2])));
 }

  else {
    echo ' N/A ' . "\n";
  }
}
 echo '</td>' . "\n";
  
  
  echo '</tr>' . "\n";
}//end table

//echo '</table>' . "\n";
////////////////////////////////////////////////////////////////////////////////////////////

	//$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//var_dump($sheetData);
	//echo '<br /><br />';
	
echo '</table>' . "\n";
echo '<br>';
echo '<br>';

/*
MFL031
AVI069
RRB003
ALO063
JDL021
EAL029
JLA131
AHE083
JBA101
LCA104
OPO015
*/


?>


        
        