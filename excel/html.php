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
 
<br>

<table id="customers" class"ex1">
<tr class="alt">
<td>VSL</td>
<td>Service</td>
<td>PORT</td>
<td>VOY</td>
<td>COORD</td>
<td>WEEK</td>
<td>Dep Slot</td>
<td>Arr. Slot</td>
<td>Container</td>
<td>Type</td>
<td>Status</td>
<td>Restow Track</td>
<td>Account</td>
<td>POL</td>
<td>POD</td>
<td>Weight</td>
<td>Line</td>
<td>Stow</td>
<td>Temp C</td>
<td>Imo code</td>
<td>UN</td>
<td>OWR</td>
<td>OWL</td>
<td>OH</td>
<td>OLF </td>
<td>OLA</td>
<td> REMARKS</td>
</tr> 
<tr>
<td>760 SAFMARINE BAYETTE</td>
<td>101 SAMBA</td>
<td>RGR</td>
<td>1204</td>
<td>RRB003</td>
<td>11</td>
<td>340386</td>
<td>380188</td>
<td>MWCU6197588</td>
<td>40WC</td>
<td>FCL</td>
<td>STO LSH</td>
<td>MSK</td>
<td>MVD</td>
<td>ALR</td>
<td>32</td>
<td>MSK</td>
<td>WCQ</td>
<td>-20.0°C</td>
</tr>
</table>
<body>
</html>