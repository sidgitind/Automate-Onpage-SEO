<?php 
class SiteAdmin_Model extends CI_Model
{
    /** create constructor **/
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->pdo = $this->load->database('pdo', true);
    }
    
    public function select_null_meta_data_certi()
    {
        $q = $this->pdo->query("SELECT DISTINCT(`title`), `Meta_title`, `Meta_description`, `Keywords` FROM `slugs`
                 WHERE `Meta_title` IS Null");
        return $q->result();
    }
    
    public function stored_certi_meta_data($meta_title,$meta_desc,$meta_keys,$cname)
    {
        //extract($data);
        $q = "UPDATE `slugs` SET `Meta_title`= ?,`Meta_description`= ? ,`Keywords`= ? WHERE `title`= ?";
        $query = $this->pdo->query($q,array($meta_title,$meta_desc,$meta_keys,$cname));
        return $query;
    }
    
    /** check certi url slug for prevent duplicate url on 10-april-2019 by meena **/
    public function check_certi_slug($certi_url,$cname)
    {
        $query=$this->pdo->query("SELECT `id`,`url_slug` FROM `slugs` WHERE `url_slug`=? and `title`=?",
            array($certi_url,$cname));
        return $query->result();
    }
    
    public function get_slug_data($slug)
    {
        $query=$this->pdo->query("SELECT `id`,`url_slug`, `title`, `Meta_title`, `Meta_description`, `Keywords` FROM `slugs`
        WHERE `url_slug`=?",array($slug));
        return $query->result();
    }
}
?>