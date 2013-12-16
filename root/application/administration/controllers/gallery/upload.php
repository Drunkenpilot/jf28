<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->admin || $this->admin->status !=1 ) redirect('login');
    }

    public function index() {
    	$data['title'] = $this->title('upload');
    	 $this->load->view($this->theme->admin_theme.'/header',$data);
        $this->load->view($this->theme->admin_theme.'/gallery/upload',array('error' => ''));
         $this->load->view($this->theme->admin_theme.'/footer');
    }

    public function do_upload() {
    	$md5Date = Date("Y_m_d_H_i_s");
        $upload_path_url = base_url() . '../uploads/';
		$config['file_name'] = 'photo_'.$md5Date;
        $config['upload_path'] = FCPATH . '../uploads/large';
       
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000000';

        $this->load->library('upload', $config);
     if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view($this->theme->admin_theme.'/gallery/error', $error);

            //Load the list of existing files in the upload directory
            $existingFiles = get_dir_file_info($config['upload_path']);
            $foundFiles = array();
            $f=0;
            foreach ($existingFiles as $fileName => $info) {
              if($fileName!='thumbs'){//Skip over thumbs directory
                //set the data for the json array   
                $foundFiles[$f]['name'] = $fileName;
                $foundFiles[$f]['size'] = $info['size'];
                $foundFiles[$f]['url'] = $upload_path_url.'large/' . $fileName;
                $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                $foundFiles[$f]['deleteUrl'] = base_url() . 'gallery/upload/deleteImage/' . $fileName;
                $foundFiles[$f]['deleteType'] = 'DELETE';
                $foundFiles[$f]['error'] = null;
                
                $f++;
              }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            /*
             * Array
              (
              [file_name] => png1.jpg
              [file_type] => image/jpeg
              [file_path] => /home/ipresupu/public_html/uploads/
              [full_path] => /home/ipresupu/public_html/uploads/png1.jpg
              [raw_name] => png1
              [orig_name] => png.jpg
              [client_name] => png.jpg
              [file_ext] => .jpg
              [file_size] => 456.93
              [is_image] => 1
              [image_width] => 1198
              [image_height] => 1166
              [image_type] => jpeg
              [image_size_str] => width="1198" height="1166"
              )
             */
            // to re-size for thumbnail images un-comment and set path here and in json array
            $this->load->library('image_lib');
            $large_name = $data['file_name'];
   			$medium_name = 'm_'.$data['raw_name'].$data['file_ext'];
   			$thumb_name = 'thumb_'.$data['raw_name'].$data['file_ext'];
            $config_s = array();
            $config_s['image_library'] = 'gd2';
            $config_s['source_image'] = $data['full_path'];
            $config_s['create_thumb'] = TRUE;
            $config_s['new_image'] = $data['file_path'] . '../thumbs/'.$thumb_name;
            $config_s['maintain_ratio'] = TRUE;
            $config_s['thumb_marker'] = '';
            $config_s['width'] = 250*$data['image_width']/$data['image_height'];
            $config_s['height'] = 250;
			$config_m = array();
            $config_m['image_library'] = 'gd2';
            $config_m['source_image'] = $data['full_path'];
            $config_m['create_thumb'] = TRUE;
            $config_m['new_image'] = $data['file_path'] . '../medium/'.$medium_name;
            $config_m['maintain_ratio'] = TRUE;
            $config_m['thumb_marker'] = '';
            if($data['image_height']<760){
            $config_m['width'] = $data['image_width'];
            $config_m['height'] = $data['image_height'];
            }else{
            $config_m['width'] = 760*$data['image_width']/$data['image_height'];
            $config_m['height'] = 760;
            }
            
            $this->image_lib->initialize($config_s);
            $this->image_lib->resize();
			$this->image_lib->initialize($config_m);
			$this->image_lib->resize();
          
            //set the data for the json array	
            $info = new stdClass();
            $info->name = $data['file_name'];
            $info->size = $data['file_size'];
            $info->type = $data['file_type'];
            $info->url = $upload_path_url.'large/' . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $thumb_name;
            $info->deleteUrl = base_url() . 'gallery/upload/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;
			
            $files[] = $info;
            
            $num = photo::count();
            $position = $num+1;
            $newPhotoData = array('id'=>'','filename_l'=>$large_name,'filename_m'=>$medium_name,'filename_s'=>$thumb_name,'thumb_width'=>$config_s['width'],'thumb_height'=>$config_s['height'],'position'=>$position,'active'=>1);
            $newPhoto = photo::create($newPhotoData);
            
            //this is why we put this in the constants to pass only json data
            if (IS_AJAX) {
                echo json_encode(array("files" => $files));
                //this has to be the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
                // so that this will still work if javascript is not enabled
            } else {
                $file_data['upload_data'] = $this->upload->data();
                $data['title'] = $this->title('success');
                $this->load->view($this->theme->admin_theme.'/header',$data);
                $this->load->view($this->theme->admin_theme.'/gallery/upload_success', $file_data);
                $this->load->view($this->theme->admin_theme.'/footer');
            }
        }
 
    }


    public function deleteImage($file) {//gets the job done but you might want to add error checking and security
    	 $deleteItem = photo::find_by_filename_l($file);
    	 $deleteItem->delete();
   		 $reposition = photo::find('all',array('conditions'=>array('position >'.$deleteItem->position)));
		 if($reposition):
   		 foreach ($reposition as $res){
			$res->position = $res->position-1;
			$res->save();
		 }
		 endif;
     	 $success = unlink(FCPATH . '../uploads/large/' . $file);
     	 $success = unlink(FCPATH . '../uploads/medium/' . 'm_'.$file);
         $success = unlink(FCPATH . '../uploads/thumbs/' . 'thumb_'.$file);
         
        //info to see if it is doing what it is supposed to	
        $info = new stdClass();
        $info->sucess = $success;
        $info->path = base_url() . '../uploads/large/' . $file;
        $info->file = is_file(FCPATH . '../uploads/large/' . $file);

        if (IS_AJAX) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete		
             $file_data['delete_data'] = $file;
             $this->load->view($this->theme->admin_theme.'/header',$data);
             $this->load->view($this->theme->admin_theme.'/gallery/delete_success', $file_data);
             $this->load->view($this->theme->admin_theme.'/footer');
        }
    }

}