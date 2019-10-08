<?php 
class SiteAdmin_Controller extends CI_Controller
{
    public $certi_url="top rated certification institutes-";
    
    /** create constructor **/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SiteAdmin_Model');
        $this->load->library('sitemap_url');
       /** configuration of slug library **/
        $config = array(
            'table' => 'slugs',
            'id' => 'id',
            'field' => 'url_slug',
            'title' => 'title',
            //             'Meta_title' =>'Meta_title',
            //             'Meta_description' => 'Meta_description',
            //             'Keywords' => 'Keywords',
            'replacement' => 'dash' // Either dash or underscore
        );
        $this->load->library('slug', $config);
    }
    
    /** insert certficate slug url in database **/
    public function insert_slug($cname,$url_slug,$metatitle,$metadesc)
    {
        $data = array(
            'title' => $cname,
            'url_slug' => $url_slug.$cname,
            'Meta_title' =>$metatitle,
            'Meta_description' => $metadesc,
            //'Keywords' => $keywords
        );
        $data['url_slug'] = $this->slug->create_uri($data);
        $this->db->insert('slugs', $data);
    }
    
    
    /** removed duplicate certificate related link from **/
    public function removed_duplicate_url_links($file_name)
    {
        /** read xml file **/
        $xml = simplexml_load_file($file_name);
        
        $seen = array();
        /** count no of urls in xml file **/
        $len=$xml->url->count();
        
        for($i=0;$i<$len;$i++)
        {
            $key=(string) $xml->url[$i]->loc;
            if (isset($seen[$key]))
            {
                unset($xml->url[$i]);
                $len--;
                $i--;
            }
            else{
                $seen[$key]=1;
            }
        }
        /** update xml file **/
        $xml->asXML($file_name);
        return true;
    }
    
    /** for add meta details select certificate view **/
    public function add_meta_details()
    {
        $data['null_meta_data'] = $this->SiteAdmin_Model->select_null_meta_data_certi();
        $this->load->view('site_admin/add_meta_details',$data);
        
    }
    
    /** for add meta details calling view**/
    public function store_certi_slugs()
    {
        $cname = $this->input->POST('certi_names');
        $this->session->set_userdata('selected_certi',$cname);
        $this->load->view('site_admin/display_certi_slug');
        
    }
    
    /** store meta details into table and xml file**/
    public function store_meta_data()
    {
        $cname = $this->session->userdata('selected_certi');
        $meta_title = $this->input->POST('meta_title');
        $meta_desc = $this->input->POST('meta_desc');
        $meta_keys = $this->input->POST('meta_keys');
        $result = $this->SiteAdmin_Model->stored_certi_meta_data($meta_title,$meta_desc,$meta_keys,$cname);
        $slug=$this->insert_certi_slug($cname,$meta_title,$meta_desc);
        echo "<script>alert('Stored meta details successfully');window.location.href='display_certi_slug/".$slug."';</script>";
        
    }
    
    /** display stored meta details with slug url**/
    public function display_certi_slug($slug)
    {
        $data['slug_info']=$this->SiteAdmin_Model->get_slug_data($slug);
        foreach ($data['slug_info'] as $d)
        {
            $data['meta_title']=$d->Meta_title;
            $data['meta_description']=$d->Meta_description;
            $data['meta_keywords']=$d->Keywords;
            $slug_id=$d->id;
        }
        $this->load->view('meta_details',$data);
    }
    
    public function insert_certi_slug($cname,$meta_title,$meta_desc)
    {
        /** added meta title,desc,keywords for certi
         $meta_title;
         $description;
         $keywords; **/
        
        $url_slug = $this->certi_url;
        /** insert certi url in slug table **/
        $url_text = str_replace(' ', '-',$url_slug);
        $certi_name = strtolower($cname);
        $cname_new = str_replace(' ', '-', $certi_name);
        
        //                     $string = str_replace("&", "and", $certi_name);
        //                     // Delete any chars but letters, numbers, spaces and _, -
        //                     $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);
        //                     //delete multiple separator
        //                     $string = preg_replace("/".$spaceRepl."+/", "", $string);
        //                     // Optional: Make the string lowercase
        //                     $string = strtolower($string);
        //                     // Optional: Delete double spaces
        //                     $string = preg_replace("/[ ]+/", " ", $string);
        //                     // Replace spaces with replacement
        //                     $cname_new = str_replace(" ", $spaceRepl, $string);
        
        $certi_url = $url_text.$cname_new;
        $certi_slug = base_url().'certificates/'.$certi_url;
        
        $data['check_certi_slug'] = $this->SiteAdmin_Model->check_certi_slug($certi_url,$cname);
        $date = date('Y-m-d');
        
        if(empty($data['check_certi_slug']))/**used empty function..11-7-2019**/
        {
            $this->insert_slug($cname,$url_slug,$meta_title,$meta_desc);
            
            /** insert certi url slug in certificate.xml file  **/
            $this->sitemap_url->add_new_url_data($certi_slug,$date,'Weekly','2.0','certificate');
        }
        
        /** removed duplicate urls and update xml file **/
        $file_name="certificate.xml";
        $this->removed_duplicate_url_links($file_name);
        echo "<script>alert('Stored certi slug url successfully.');</script>";
        return $certi_url;
    }
}
?>