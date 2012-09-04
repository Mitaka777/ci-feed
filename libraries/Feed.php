<?php
/**
 * Feed generator class for ci-feed library.
 * 
 * @author Roumen Damianoff <roumen@dawebs.com>
 * @version 1.1
 * @link https://github.com/RoumenMe/ci-feed GitHub
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

class Feed
{

    public $items = array();
    public $title;
    public $description;
    public $link;
    public $pubdate;
    public $lang='en';


    /**
     * Add new item to $items array
     */
    public function add($title, $author, $link, $pubdate, $description)
    {
        $this->items[] = array(
            'title' => $title,
            'author' => $author,
            'link' => $link,
            'pubdate' => $pubdate,
            'description' => $description
        );
    }


    /**
     * Returns aggregated feed with all items from $items array
     */
    public function render($format = 'atom')
    {
        $CI =& get_instance();
        
        $data['channel'] = array(
            'title'=>$this->title,
            'description'=>$this->description,
            'link'=>$this->link,
            'lang'=>$this->lang,
            'pubdate'=>$this->pubdate
        );
        
        $data['items'] = $this->items;
        
        $CI->load->view('feed/'.$format, $data);
    }

}