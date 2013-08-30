<?php

class Report_Crane_Form_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


	function index()//$page = 'home')
	{
	

	//	$data['title'] = ucfirst($page); // Capitalize the first letter
 // $this->load->view('templates/header', $data);


		//$this->form_validation->set_rules('username', 'Username', 'required');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required');


	
		  //$this->load->view('templates/header', $data);
	$this->load->library('ion_auth');	  
		 if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('upload');
		}
	
		  
		    //delete the files first before generating a new series to append
		  $this->load->helper('file');
		  delete_files('././csvexports');
		  delete_files('././filecounter2/0/');
		  delete_files('././filecounter2/1/');
		  delete_files('././filecounter2/2/');
		  delete_files('././filecounter2/3/');
		  delete_files('././filecounter2/4/');
		  delete_files('././filecounter2/5/');
		  delete_files('././filecounter2/6/');
		  delete_files('././filecounter2/7/');
		  delete_files('././filecounter2/8/');
		  delete_files('././filecounter2/9/');
		  delete_files('././filecounter2/10/');
		  
		  delete_files('././crane_uploads_csv/crane_uploads/');
		  
		  $this->load->view('report_crane_form_view_first_filter');
		  $this->load->view('report_crane_form_view_files');	  
			$this->load->view('report_crane_form_view');
			//$this->load->view('templates/footer', $data);


	}
	
				function download_crane()
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
     
      $merged = fopen('csvexports/mergedcrane.csv', 'w'); //w works, a does not work!
      
      while(!feof($file[0]))
      {
        fwrite($merged, fgets($file[0]));
      }
      for ($appendKey = 1; $appendKey < $numberofPartitions; $appendKey++){
       $trash = fgets($file[$appendKey]); // We don't need the first line
       $trash2 = fgets($file[$appendKey]); // Or the second
       $trash3 = fgets($file[$appendKey]); // Or the third
       $trash4 = fgets($file[$appendKey]); // or the fourth
       
       $trash5 = fgets($file[$appendKey]); // or the fifth
       $trash6 = fgets($file[$appendKey]); // or the sixth
       $trash7 = fgets($file[$appendKey]); // or the seventh
       $trash8 = fgets($file[$appendKey]); // or the eigth
       $trash9 = fgets($file[$appendKey]); // or the ninth
       $trash10 = fgets($file[$appendKey]); // or the tenth
       $trash11 = fgets($file[$appendKey]); // or the tenth
       $trash12 = fgets($file[$appendKey]); // or the tenth
       $trash13 = fgets($file[$appendKey]); // or the tenth
       
       //$trash14 = fgets($file[$appendKey]); // or the tenth
       while(!feof($file[$appendKey]))
      {
        fwrite($merged, fgets($file[$appendKey]));
      }
      }

      
      $datafile = file_get_contents("csvexports/mergedcrane.csv"); // Read the file's contents
      $namefile = 'cranesplitreport.csv';

      force_download($namefile, $datafile);
      }
      
      } // end controller
	
?>