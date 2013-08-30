<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		//$data['title'] = ucfirst($page); // Capitalize the first letter
		
		//$path = getcwd();
//echo "This Is Your Absolute Path: ";
//echo $path;
		
        $this->load->view('templates/header');
        $this->load->view('submissions');
        //$this->load->view('upload_error', array('error' => ' ' ));
        $this->load->view('upload_form', array('error' => ' ' ));
        // $this->load->view('report_shift');
         //$this->load->view('report_cranesplit');
         //$this->load->view('delete_all_button');
				$this->load->view('templates/footer');
				

	}
	    

	function do_upload()
	{
	
    $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx';
		$config['overwrite'] = 'true';
	
		//$config['upload_path'] = './shift_uploads/';
		//$config['allowed_types'] = 'xlsx';
		//$config['overwrite'] = 'true';
	
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);
		

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('templates/header');
			$this->load->view('submissions');
			//$this->load->view('upload_error', $error);
			$this->load->view('upload_form', $error);	
			//$this->load->view('report_shift');
      //$this->load->view('report_cranesplit');
			//$this->load->view('delete_all_button');
			$this->load->view('templates/footer');
		
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			//echo $data; //this was a test not useful learned its blank
			
			//Moving files
			$uploaddata = $this->upload->data(); //make new array
            
			$uploads_dir = 'shift_uploads';
			$name = $uploaddata['file_name'];
			$filetest = $uploaddata['raw_name'];
			
			$uploads_dir2 = 'crane_uploads';
			
			//////////////////////////////////////////////////////
			$directory = 'uploads';
      $fileArray = scandir($directory);
      $slicedFiles = array_slice($fileArray, 2);
      
     function test_alter_upload(&$item1, $key, $prefix)
    {
      $item1 = "$prefix$item1";
    }
      array_walk($slicedFiles, 'test_alter_upload', 'uploads/');
			///////////////////////////////////////////////////////////
			
			//$name2 = $uploaddata['file_name'];
			//$filetest2 = $uploaddata['raw_name'];
			
			//echo $name;
			//echo $filetest;
			$wrongconvention = 'no';
///SHIFTING///////			
			if (in_array("uploads/mfl031shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/mfl031shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/mfl031shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/mfl031shifting.xlsx");
       
       }
      else if (in_array("uploads/avi069shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/avi069shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/avi069shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/avi069shifting.xlsx");
       
       }
          else if (in_array("uploads/rrb003shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/rrb003shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/rrb003shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/rrb003shifting.xlsx");
       
       }  
          else if (in_array("uploads/alo063shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/alo063shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/alo063shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/alo063shifting.xlsx");
       
       }  
          else if (in_array("uploads/jdl021shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/jdl021shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/jdl021shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/jdl021shifting.xlsx");
       
       }  
          else if (in_array("uploads/jla131shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/jla131shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/jla131shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/jla131shifting.xlsx");
       
       }  
          else if (in_array("uploads/ahe083shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/ahe083shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/ahe083shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/ahe083shifting.xlsx");
       
       }  
          else if (in_array("uploads/jba101shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/jba101shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/jba101shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/jba101shifting.xlsx");
       
       }  
          else if (in_array("uploads/lca104shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/lca104shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/lca104shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/lca104shifting.xlsx");
       
       }  
          else if (in_array("uploads/opo015shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/opo015shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/opo015shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/opo015shifting.xlsx");
       
       } 
          else if (in_array("uploads/eal029shifting.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/eal029shifting.xlsx","/home/slesuj/public_html/maersk/$uploads_dir/eal029shifting.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/eal029shifting.xlsx");
       
       }            
       
       
//CRANESPLIT//////       
       else if (in_array("uploads/rrb003cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/rrb003cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/rrb003cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/rrb003cranesplit.xlsx");
       
       }
       else if (in_array("uploads/mfl031cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/mfl031cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/mfl031cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/mfl031cranesplit.xlsx");
       
       }
      else if (in_array("uploads/avi069cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/avi069cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/avi069cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/avi069cranesplit.xlsx");
       
       }
      else if (in_array("uploads/alo063cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/alo063cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/alo063cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/alo063cranesplit.xlsx");
       
       }
      else if (in_array("uploads/jdl021cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/jdl021cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/jdl021cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/jdl021cranesplit.xlsx");
       
       }
       else if (in_array("uploads/eal029cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/eal029cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/eal029cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/eal029cranesplit.xlsx");
       
       }
       else if (in_array("uploads/jla131cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/jla131cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/jla131cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/jla131cranesplit.xlsx");
       
       }
       else if (in_array("uploads/ahe083cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/ahe083cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/ahe083cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/ahe083cranesplit.xlsx");
       
       }
       else if (in_array("uploads/jba101cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/jba101cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/jba101cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/jba101cranesplit.xlsx");
       
       }
       else if (in_array("uploads/lca104cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/lca104cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/lca104cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/lca104cranesplit.xlsx");
       
       }
       else if (in_array("uploads/opo015cranesplit.xlsx", $slicedFiles)) {
        
        copy("/home/slesuj/public_html/maersk/uploads/opo015cranesplit.xlsx","/home/slesuj/public_html/maersk/$uploads_dir2/opo015cranesplit.xlsx");
        unlink("/home/slesuj/public_html/maersk/uploads/opo015cranesplit.xlsx");
       
       }
			else 
        $wrongconvention = 'yes';
			
			/*
      if ($filetest == 'mfl031shifting' || 'avi069shifting' || 'rrb003shifting' || 'alo063shifting' ||
      'jdl021shifting' || 'eal029shifting' || 'jla131shifting' || 'ahe083shifting' || 'jba101shifting' ||
      'lca104shifting' || 'opo015shifting'):
     // rename ("/uploads/$name", "$uploads_dir/$name");
        //move_uploaded_file("/uploads/$name", "$uploads_dir/$name");
        
       copy("/home/slesuj/public_html/maersk/uploads/$name","/home/slesuj/public_html/maersk/$uploads_dir/$name");
       unlink("/home/slesuj/public_html/maersk/uploads/$name");
        
      //  $old = "/home/slesuj/public_html/maersk/uploads/$name";
      //  $new = "/home/slesuj/public_html/maersk/$uploads_dir/$name";
      //  copy($old, $new) or die("Unable to copy $old to $new.");
        
        
       elseif ($filetest == 'mfl031cranesplit' || 'avi069cranesplit' || 'rrb003cranesplit' || 'alo063cranesplit' ||
      'jdl021cranesplit' || 'eal029cranesplit' || 'jla131cranesplit' || 'ahe083cranesplit' || 'jba101cranesplit' ||
      'lca104cranesplit' || 'opo015cranesplit'):
     // rename ("/uploads/$name", "$uploads_dir/$name");
        //move_uploaded_file("/uploads/$name", "$uploads_dir/$name");
        
       copy("/home/slesuj/public_html/maersk/uploads/$name","/home/slesuj/public_html/maersk/$uploads_dir2/$name");
       unlink("/home/slesuj/public_html/maersk/uploads/$name");
   
      //  $old = "/home/slesuj/public_html/maersk/uploads/$name";
      //  $new = "/home/slesuj/public_html/maersk/$uploads_dir/$name";
      //  copy($old, $new) or die("Unable to copy $old to $new.");
        
endif;   
*/ 
        /*
        foreach($uploaddata as $detailkey => $detail){
         if (is_array($detail)){
          echo $detailkey ." = ". $detail[0] ."<br>"; 
          } 
          elseif(!is_null($detail)) { 
          echo $detailkey ." = ". $detail ."<br>"; 
          } 
          }
      */  
      
			$this->load->view('templates/header');
			$this->load->view('submissions');
			$this->load->view('upload_success', $data); //fix these parameters to display success msg
			
			if ($wrongconvention == 'yes'){
			$this->load->view('convention_error');
			}
			
			$this->load->view('upload_form',  array('error' => ' ' ));
			//$this->load->view('report_shift');
      //$this->load->view('report_cranesplit');
			//$this->load->view('delete_all_button');
			$this->load->view('templates/footer');

			


			
		} //end else
	} // end do upload
	
	function do_delete_all()
	{
	$this->load->helper('file');
	delete_files('././crane_uploads');
	delete_files('././shift_uploads');
	delete_files('././uploads');
	
	   $this->load->view('templates/header');
        $this->load->view('submissions');
        //$this->load->view('upload_error', array('error' => ' ' ));
        $this->load->view('upload_form', array('error' => ' ' ));
        //$this->load->view('report_shift');
         //$this->load->view('report_cranesplit');
         //$this->load->view('delete_all_button');
				$this->load->view('templates/footer');
	}
	
}
?>