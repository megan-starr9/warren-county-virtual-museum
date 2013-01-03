<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Tags model
 *
 * Model contains functions for tags
 *
 * @package     VM
 * @subpackage	Models
 * @category	Tags
 * @author	Paul Schuytema
 * 
 */
class m_vm_tags extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function new_tag($tag_id=NULL)
    {
        $data = array(
            'Tag_Text' => strtolower($this->pcs_utility->db_clean(strip_tags($this->input->post('Tag_Text')),100))
        );
        $this->db->set($data);
        if (isset($tag_id))
        {
            
            $this->db->where('PK_Tag_Id',$this->pcs_utility->id_clean($tag_id));
            $this->db->update('vm_tags');
        } else {
            $this->db->insert('vm_tags');
        }

    }
    
    function delete_tag($tag_id=NULL)
    {
        if(isset($tag_id))
        {
            $this->db->where('PK_Tag_Id', $tag_id);
            $this->db->delete('vm_tags');
        }
        //@todo
        //remove all tag links as well
    }
    
    function get_tag_count()
    {
        $query = $this->db->get('vm_tags');
        return $query->num_rows();
    }
    
    function get_tags()
    {
        $this->db->order_by("Tag_Text", "ASC"); 
        return $this->db->get('vm_tags');
    }
    
    function get_tag_text($tag_id=NULL)
    {
        $tag_text = NULL;
        if(isset($tag_id))
        {
            $tags = $this->db->get_where('vm_tags', array('PK_Tag_Id' => $tag_id));
            if ($tags->num_rows() > 0)
            {
                $tag = $tags->result();
                foreach($tag AS $row)
                {
                    $tag_text = $row->Tag_Text;
                }
            }
        }
        return $tag_text;
    }
    


    
    
        
}
/* End of file m_vm_tags.php */
/* Location: ./application/models/m_vm_tags.php */