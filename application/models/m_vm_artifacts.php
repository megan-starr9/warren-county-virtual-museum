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
        	'Creator_Id' => $this->bitauth->userid
        );
        
        $this->db->set($data);
        if (isset($artifact_id))
        {
        	//If given existing artifact, update it
            $this->db->where('PK_Artifact_Id',$this->pcs_utility->id_clean($artifact_id));
            $this->db->update('vm_artifacts', $data);
        } else {
        	// If not given artifact, create new one
            $this->db->insert('vm_artifacts', $data);
        }
        
        /*
         * Update Log Data
        */
        $data2 = array(
        		'Contributor_Id' => $this->bitauth->userid,
        		'Changed_Table' => 'vm_artifact'
        );
        
        if(isset($artifact_id))
        {
        	// If artifact is being edited
        	$data2['Changed_PK'] = $artifact_id;
        	$data2['Change_Type'] = 'Update Record';
        }
        else {
        	// If artifact is being introduced
        	$data2['Changed_PK'] = mysql_insert_id();
        	$data2['Change_Type'] = 'New Record';
        }
        
        $this->db->insert('vm_changelog', $data2);

    }
    
    function delete_artifact($artifact_id=NULL)
    {
        if(isset($artifact_id))
        {
        	// Delete Artifact
            $this->db->where('PK_Artifact_Id', $artifact_id);
            $this->db->limit(1);
            $this->db->delete('vm_artifacts');
            
            // Delete Tags
            // @todo once objects are tagged
            
            // Delete Media
            $this->db->where('FK_Artifact_Id', $artifact_id);
            $this->db->delete('vm_media_object');
            
            $data = array(
            		'Contributor_Id' => $this->bitauth->userid,
            		'Changed_Table' => 'vm_artifact',
            		'Changed_PK' => $artifact_id,
            		'Change_Type' => 'Delete Record'
            );
            $this->db->insert('vm_changelog', $data);
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