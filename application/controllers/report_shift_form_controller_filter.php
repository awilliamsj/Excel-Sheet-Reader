<?php

class Report_Shift_Form_Controller_Filter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


	function index($page = 'home')
	{
	

	$data['title'] = ucfirst($page); // Capitalize the first letter
 // $this->load->view('templates/header', $data);


		//$this->form_validation->set_rules('username', 'Username', 'required');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required');


	  //$this->load->view('templates/header', $data);
		  
    //delete the files first before generating a new series to append
		  $this->load->helper('file');
		  delete_files('././csvexports');
		  
		  $this->load->view('report_shift_form_view_files');
			//$this->load->view('report_shift_form_view');
			//$this->load->view('templates/footer', $data);

}		
			function download_shift()
      {
      $this->load->helper('download');
 
////////////////////////////////////////////////////////////////////////// 
     
      $directory = 'csvexports/';

      $fileArray = scandir($directory);
      $inputFileNames = array_slice($fileArray, 2);
      
      function test_alter(&$item1, $key, $prefix)
      {
        $item1 = "$prefix$item1";
      }
      array_walk($inputFileNames, 'test_alter', 'csvexports/');

$numberofPartitions = sizeof($inputFileNames); //11 fix names but this is the low value
//$appendPartitions = ($numberofPartitions - 1); //10 this is the high value LOL

//////////////////////////////////////////////////////////////////////////   
      
      for ($fileNumber = 0; $fileNumber < $numberofPartitions; $fileNumber++){ 
     
          $file[$fileNumber] = fopen("csvexports/$fileNumber.csv", 'r');
      }
      //$file1 = fopen('csvexports/0.csv', 'r');
      //$file2 = fopen('csvexports/1.csv', 'r');
     
      $merged = fopen('csvexports/mergedshift.csv', 'w'); //w works, a does not work!
      
      while(!feof($file[0]))
      {
        fwrite($merged, fgets($file[0]));
        
      }
      for ($appendKey = 1; $appendKey < $numberofPartitions; $appendKey++){
       $trash = fgets($file[$appendKey]); // We don't need the first line
       $trash2 = fgets($file[$appendKey]); // We don't need the second line
       $trash3 = fgets($file[$appendKey]); // We don't need the third line
       $trash4 = fgets($file[$appendKey]); // We don't need the fourth line
       while(!feof($file[$appendKey]))
      {
        //$testing = fgets($file[$appendKey]);
       // if ($testing == null){
       // break;
       // }
       // else
            fwrite($merged, fgets($file[$appendKey]));

      }
      
      }
           
    
         /* 
       for ($file_counter = 1; $file_counter < sizeof($inputFileNames); $file_counter++){         
          $trash = fgets($file_part_open[$file_counter],4096); // We don't need the first line
          while(!feof($file_part_open[$file_counter]))
          {
           //echo fgets($file2). "<br />";
           fwrite($merged, fgets($file_part_open[$file_counter]));
          }
          } //end for
       
      */
      
      $datafile = file_get_contents("csvexports/mergedshift.csv"); // Read the file's contents
      $namefile = 'shiftingreport.csv';

      force_download($namefile, $datafile);
  
      } //end download
      
      } // end controller
      
?>