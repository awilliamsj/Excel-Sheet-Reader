<?php
/*
 This file will generate our CSV table. There is nothing to display on this page, it is simply used
 to generate our CSV file and then exit. That way we won't be re-directed after pressing the export
 to CSV button on the previous page.
*/
?>
<?php
$list = array
(
"Peter,Griffin,Oslo,Norway",
"Glenn,Quagmire,Oslo,Norway",
);

$file = fopen("contacts.csv","w");

foreach ($list as $line)
  {
  fputcsv($file,split(',',$line));
  }

fclose($file); 
?>