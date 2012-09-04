# [ci-feed](http://roumen.me/projects/ci-feed) library

A simple feed generator for CodeIgniter.

## Installation

To install just copy/paste the content of ci-feed in your application folder.

## Example

```php
public function feed()
{
    // creating rss feed with our most recent 20 posts in variable $post
    
    // first load the library
    $this->load->library('feed');
    
    // create new instance
    $feed = new Feed();

    // set title, description, link, language and pubdate for your feed
    $feed->title = 'Your title';
    $feed->description = 'Your description';
    $feed->link = 'http://yoursite.com';
    $feed->lang = 'en';
    $feed->pubdate = $posts[0]->created; // date of your last update (in this example create date of your latest post)

    // add posts to the feed
    foreach ($posts as $post)
    {
        // title, author, url, pubdate, description
        $feed->add($post->title, $post->author, $post->slug, $post->created, $post->description);
    }
    
    // show the feed (options: 'atom' (recommended) or 'rss')
    $feed->render('atom');
}
```