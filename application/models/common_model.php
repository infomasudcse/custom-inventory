<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_Model extends CI_Model{
    
    public function fetch_data_limit($table, $limit){
        $this->db->limit($limit);
        $this->db->order_by('id', 'desc');
       $sql = $this->db->get($table);
        return $sql->result();
        
    }
    
    public function insert_data($table, $data){
       if($this->db->insert($table, $data))
            return true;
       else return false;
    }
    
    public function fetch_all($table, $conditions){
       $sql = 'SELECT * FROM '.$table.' '.$conditions;
       
       $query = $this->db->query($sql);       
       $result = $query->result();
       return $result;
    }
    
	public function check_data($table, $name){
		$this->db->where('name', $name);
		$query = $this->db->get($table);
		$result = $query->num_rows();
		if($result > 0)
		return true;
		else return false;
	}

        public function fetch_by_id($table, $id){
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->row();       
        
    }
    
    public function update_data($table, $data, $id){
        $this->db->where('id', $id);
        if($this->db->update($table, $data))
                return true;
        else
            return false;
        
    }
    
    public function delete_row($table, $id){
        $this->db->where('id' , $id);
       if($this->db->delete($table))
           return true;
       else return false;
        
        
    }
    
    public function count_all_data($table){
       
        $query = $this->db->get($table);
        return $query->num_rows();
        
    }
    
public function fetch_all_pagination($table, $limit, $start){
    $this->db->limit($limit, $start);
        $query = $this->db->get($table);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    
    
    
}
    
}

?>
