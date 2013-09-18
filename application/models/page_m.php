<?php
    class Page_m extends MY_Model
    {
        protected $_table_name = 'pages';
        protected $_order_by = 'order';
        protected $_rules = array();
        
        public $rules = array(
        'email' => array(
                    'field' => 'title', 
                    'label' => 'Title', 
                    'rules' => 'trim|required|xss_clean|max_length[100]'
        ),
        'body' => array(
                    'field' => 'body', 
                    'label' => 'Body', 
                    'rules' => 'trim|required'
        ),
        'slug' => array(
                    'field' => 'slug', 
                    'label' => 'Slug', 
                    'rules' => 'trim|required|xss_clean|callback__unique_slug'
        )
        );
        
        public function get_new()
        {
            $page = new stdClass();
        
            $page->title = '';
            $page->body = '';
            $page->slug = '';
        
            return $page;
        }
    }
