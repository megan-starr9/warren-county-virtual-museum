<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class File {

        /**
     * Upload a file
     *
     * Uploads a file to the "upload_path" folder.
     * Grabs the $_POST value associated with $field_name.
     *
     * @access	public
     * @param	string
     * @return	string
     */
    function upload_file($field_name)
    {
        $CI =& get_instance();
        $filename = NULL;
        //define path
        $config['upload_path'] = $CI->config->item('btf_upload_path');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1024';
        $config['encrypt_name']  = 'TRUE';
        $config['max_width'] = '640';
        $config['max_height'] = '480';
       
        $CI->load->library('upload', $config);
        
        //echo 'in function!';

        if ( ! $CI->upload->do_upload($field_name))
        {
            echo $CI->upload->display_errors();
        }
        else
        {
            $file_data = $CI->upload->data();
            $filename = $file_data['file_name'];
            //log_message('info','filename: '.$filename);
        }
        return $filename;
    }

    /**
     * Removes a file
     *
     * Deletes a file in the "upload_path" folder.
     *
     * @access	public
     * @param	string
     * @return	boolean
     */
    function remove_file($file_name)
    {
        //@todo error handling and different paths
        $CI =& get_instance();
        $upload_path = $CI->config->item('btf_upload_path');

        $success = unlink($upload_path.$file_name);
        //log_message('info','to delete: '.$upload_path.$file_name);
        //log_message('info','delete success: '.$success);
        return $success;
    }

    
    



     
}

// END File class

/* End of file file.php */
/* Location: ./application/libraries/file.php */
