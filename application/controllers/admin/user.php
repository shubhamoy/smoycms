<?php
    class User extends Admin_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->data['meta_title'] = 'My CMS';
        }
        
        public function index()
        {
            // Fetch all users
            $this->data['users'] = $this->user_m->get();
            
            // Load the view
            $this->data['subview'] = 'admin/user/index';
            $this->load->view('admin/_layout_main', $this->data);
        }
        
        public function edit($id = NULL)
        {
            // Fetch a record or set a new one
            if($id)
            {
                $this->data['user'] = $this->user_m->get($id);
                count($this->data['user']) || $this->data['errors'][] = 'User not found';
            }
            else
            {
                $this->data['user'] = $this->user_m->get_new();
            }
            
            // Setup the form
            $rules = $this->user_m->rules_admin;
            $id || $rules['password']['rules'] .= '|required';
            $this->form_validation->set_rules($rules);
            
            // Validate the form
            if($this->form_validation->run() == TRUE)
            {
               $data = $this->user_m->array_from_post(array('name', 'email', 'password'));
               $data['password'] = $this->user_m->smoyhash($data['password']);
               
               $this->user_m->save($data, $id);
               redirect('admin/user');
            }
            
            // Load the view
            $this->data['subview'] = 'admin/user/edit';
            $this->load->view('admin/_layout_main', $this->data);
        }
        
        public function delete($id)
        {
            $this->user_m->delete($id);
            redirect('admin/user');
        }
        
        public function login()
        {
            // Redirect a user if he's already logged in
            $dashboard = 'admin/dashboard';
            $this->user_m->loggedin() == FALSE  || redirect($dashboard);
            
            // Setup Form
            $rules = $this->user_m->rules;
            $this->form_validation->set_rules($rules);
            
            // Validate Form
            if($this->form_validation->run() == TRUE)
            {
                //Logged in Successfully. Now redirect
                if($this->user_m->login() == TRUE)
                {
                    redirect($dashboard);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Invalid Email or Password :(');
                    redirect('admin/user/login', 'refresh');
                }
            }
            
            // Load the View
            $this->data['subview'] = 'admin/user/login';
            $this->load->view('/admin/_layout_modal', $this->data);
        }
        
        public function logout()
        {
            $this->user_m->logout();
            redirect('admin/user/login');
        }
        
        public function _unique_email($str)
        {
            // Don't validate if email exists
            
            $id = $this->uri->segment(4);
            $this->db->where('email', $this->input->post('email'));   
            !$id || $this->db->where('id !=', $id);
            $user = $this->user_m->get();
            
            if(count($user))
            {
                $this->form_validation->set_message('_unique_email', '%s should be unique');
                return FALSE;
            }
            return TRUE;
        }
    }
