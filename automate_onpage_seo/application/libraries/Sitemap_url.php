<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap_url
{
    /* function for create new xml file */
    public function create_sitemap_xml($name,$date,$frequency,$priority)
    {
        /* create a dom document with encoding utf8 */
        $domtree = new DOMDocument('1.0', 'UTF-8');
        
        /* create the root element of the xml tree */
        $xmlRoot = $domtree->createElement("urlset");
        /* append it to the document created */
        $xmlRoot = $domtree->appendChild($xmlRoot);
        
        /* using array values for create dynamic nodes */
//         foreach ($data['domains'] as $d)
//         {
//             $domain=$d->Certi_Area;
            
            $currentTrack = $domtree->createElement("url");
            $currentTrack = $xmlRoot->appendChild($currentTrack);
            
            /* create node and pass text or value */
            $currentTrack->appendChild($domtree->createElement('loc',$name));
            $currentTrack->appendChild($domtree->createElement('lastmod',$date));
            $currentTrack->appendChild($domtree->createElement('changefreq',$frequency));
            $currentTrack->appendChild($domtree->createElement('priority',$priority));
        //}
        /* get the xml file output */
        $domtree->save('sitemap.xml');
        return true;
    }
    
    /* function for add new nodes in existing xml file */
    public function add_new_url_data($name,$date,$frequency,$priority,$url_type)
    {
        switch ($url_type) 
        {
            case "certificate":
                    /* Open and parse the XML file */
                    $xml = simplexml_load_file("certificate.xml");
                
                    /* Create a new node */
                    $node = $xml->addChild('url');
                    $node->addChild('loc', $name);
                    $node->addChild('lastmod', $date);
                    $node->addChild('changefreq', $frequency);
                    $node->addChild('priority', $priority);
                
                    /* Store new XML code in sitemap.xml */
                    $xml->asXML("certificate.xml");
                    return true;
                break;
            case "institute":
                    /* Open and parse the XML file */
                    $xml = simplexml_load_file("institutes.xml");
                
                    /* Create a new node */
                    $node = $xml->addChild('url');
                    $node->addChild('loc', $name);
                    $node->addChild('lastmod', $date);
                    $node->addChild('changefreq', $frequency);
                    $node->addChild('priority', $priority);
                
                    /* Store new XML code in sitemap.xml */
                    $xml->asXML("institutes.xml");
                    return true;
                break;
            case "event":
                    /* Open and parse the XML file */
                    $xml = simplexml_load_file("event.xml");
                
                    /* Create a new node */
                    $node = $xml->addChild('url');
                    $node->addChild('loc', $name);
                    $node->addChild('lastmod', $date);
                    $node->addChild('changefreq', $frequency);
                    $node->addChild('priority', $priority);
                
                    /* Store new XML code in sitemap.xml */
                    $xml->asXML("event.xml");
                    return true;
                break;
            default:     
        }
        
        
    }
}
?>
