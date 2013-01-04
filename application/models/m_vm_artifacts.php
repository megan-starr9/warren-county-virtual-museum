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
            'Title' => strtolower($this->pcs_utility->db_clean(strip_tags($this->input->post('Title')),100))
        );
        $this->db->set($data);
        if (isset($artifact_id))
        {
            
            $this->db->where('PK_Artifact_Id',$this->pcs_utility->id_clean($artifact_id));
            $this->db->update('vm_artifacts');
        } else {
            $this->db->insert('vm_artifacts');
        }

    }
    
    function delete_artifact($artifact_id=NULL)
    {
        if(isset($artifact_id))
        {
            $this->db->where('PK_Artifact_Id', $artifact_id);
            $this->db->delete('vm_artifacts');
        }
        //@todo
        //remove all edia objects as well (or leave hanging?)
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