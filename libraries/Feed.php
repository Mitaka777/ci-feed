<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
/**
 * Feed generator class for ci-feed library.
 *
 * @author Roumen Damianoff <roumen@dawebs.com>
 * @version 1.2.2
 * @link http://roumen.it/projects/ci-feed
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

class Feed
{

    public $items = array();
    public $title = 'My feed title';
    public $description = 'My feed description';
    public $link;
    public $pubdate;
    public $lang;


    /**
     * Add new item to $items array
     *
     * @param string $title
     * @param string $author
     * @param string $link
     * @param string $pubdate
     * @param string $description
     *
     * @return void
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
     *
     * @param string $format (options: 'atom', 'rss')
     *
     * @return view
     */
    public function render($format = 'atom')
    {
        $CI =& get_instance();

        if (empty($this->lang)) $this->lang = $CI->config->item('language');
        if (empty($this->link)) $this->link = $CI->config->item('base_url');
        if (empty($this->pubdate)) $this->pubdate = date('D, d M Y H:i:s O');

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