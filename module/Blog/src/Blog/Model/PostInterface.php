<?php 

namespace Blog\Model;

interface PostInterface
{


    public function getId();

    /*
      * Will return the ID of the blog post
      *
      * @return int
      */

    public function getTitle();

    /*
      * Will return the TITLE of the blog post
      *
      * @return string
      */

    public function getText();

    /*
      * Will return the TEXT of the blog post
      *
      * @return string
      */
}