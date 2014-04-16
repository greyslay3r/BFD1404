<?php

    class Testmodel extends CI_Model
    {
        function getAllRecords()
        {
 
             $q = $this->db->get("users");
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
        }
    }
?>

