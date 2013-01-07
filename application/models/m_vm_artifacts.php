<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Artifacts model
 *
 * Model contains functions for tags
 *
 * @package     VM
 * @subpackage	Models
 * @category	Artifacts
 * @author	Paul Schuytema
 * 
 */
class m_vm_artifacts extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function new_artifact($artifact_id=NULL)
    {
        //not done!!!
        $data = array(
            'Title' => $this->pcs_utility->db_clean(strip_tags($this->input->post('Title')),100),
            'Org' => $this->pcs_utility->db_clean(strip_tags($this->input->post('Org')),100),
        	'Description' => $this->pcs_utility->db_clean(strip_tags($this->input->post('Description'))),
        		// 0 for now, must find user session data
        	'Creator_Id' => 0
        );
        $this->db->set($data);
        if (isset($artifact_id))
        {
            $this->db->where('PK_Artifact_Id',$this->pcs_utility->id_clean($artifact_id));
            $this->db->update('vm_artifacts', $data);
        } else {
            $this->db->insert('vm_artifacts', $data);
        }

    }
    
    function delete_artifact($artifact_id=NULL)
    {
        if(isset($artifact_id))
        {
            $this->db->where('PK_Artifact_Id', $artifact_id);
            $this->db->limit(1);
            $this->db->delete('vm_artifacts');
        }
        //@todo
        //remove all media objects as well (or leave hanging?)
    }
    
    function get_artifacts()
    {
        $this->db->order_by("Title", "ASC"); 
        return $this->db->get('vm_artifacts');
    }
    
    function get_artifact($artifact_id=NULL)
    {
        if(isset($artifact_id))
        {
            return $this->db->get_where('vm_artifacts', array('PK_Artifact_Id' => $artifact_id));
        }
    }
    


    
    
        
}
/* End of file m_vm_artifacts.php */
/* Location: ./application/models/m_vm_artifacts.php */