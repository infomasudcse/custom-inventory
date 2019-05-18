<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_Model extends CI_Model{
    
    public function generate_expense_report($inputs){
        if($inputs['expense_type_id'] != ''){
            $this->db->where('expense_type_id', $inputs['expense_type_id']);
        }
        if($inputs['type'] == 'sp'){
            $start = $inputs['start'];
            $end = $inputs['end'];
            $dateRange = "date BETWEEN '$start%' AND '$end%'";
            $this->db->where($dateRange, NULL, FALSE); 
        }
        $query = $this->db->get('expense');
        return $query->result();
    }
    
    public function generate_purchase_report($inputs){
        if($inputs['supplier'] != ''){
            $this->db->where('supplier_id', $inputs['supplier']);
        }
         if($inputs['invoice'] != ''){
            $this->db->where('invoice', $inputs['invoice']);
        }
        if($inputs['type'] == 'sp'){
            $start = $inputs['start'];
            $end = $inputs['end'];
            $dateRange = "date BETWEEN '$start%' AND '$end%'";
            $this->db->where($dateRange, NULL, FALSE); 
        }
        
        $query = $this->db->get('purchase');
        return $query->result();
    }
    
    public function generate_payment_report($inputs){
        if($inputs['from_people_id'] != ''){
            $this->db->where('from_people_id', $inputs['from_people_id']);
        }
        if($inputs['to_people_id'] != ''){
            $this->db->where('to_people_id', $inputs['to_people_id']);
        }
                    
        
         if($inputs['type'] == 'sp'){
            $start = $inputs['start'];
            $end = $inputs['end'];
            $dateRange = "date BETWEEN '$start%' AND '$end%'";
            $this->db->where($dateRange, NULL, FALSE); 
        }
        
        $query = $this->db->get('payment');
        return $query->result();
    }
    
    public function generate_revenue_report($inputs){
         if($inputs['revenue_type_id'] != ''){
            $this->db->where('revenue_type_id', $inputs['revenue_type_id']);
        }
        if($inputs['type'] == 'sp'){
            $start = $inputs['start'];
            $end = $inputs['end'];
            $dateRange = "date BETWEEN '$start%' AND '$end%'";
            $this->db->where($dateRange, NULL, FALSE); 
        }
        $query = $this->db->get('revenue');
        return $query->result();
    }
    
    public function generate_sales_report($inputs){
         if($inputs['buyer_id'] != ''){
            $this->db->where('buyer_id', $inputs['buyer_id']);
        }
         if($inputs['product_id'] != ''){
            $this->db->where('product_id', $inputs['product_id']);
        }
         if($inputs['invoice'] != ''){
            $this->db->where('invoice', $inputs['invoice']);
        }
         if($inputs['bill_number'] != ''){
            $this->db->where('bill_number', $inputs['bill_number']);
        }
        if($inputs['type'] == 'sp'){
            $start = $inputs['start'];
            $end = $inputs['end'];
            $dateRange = "date BETWEEN '$start%' AND '$end%'";
            $this->db->where($dateRange, NULL, FALSE); 
        }
        $query = $this->db->get('sales');
        return $query->result();
    }
    
}

?>
