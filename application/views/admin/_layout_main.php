<?php $this->load->view('admin/components/page_head');?>
    <body>
        <div class="navbar navbar-static-top navbar-inverse">
            <div class="navbar-inner">
                <a class="brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title;?></a>
                <ul class="nav">
                  <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a></li>
                  <li><?php echo anchor('admin/page', 'Pages');?></li>
                  <li><?php echo anchor('admin/user', 'Users');?></li>
                </ul>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="span9">
                    <?php $this->load->view($subview);?>
                </div>
                <!-- Sidebar -->
                <div class="span3">
                    <section>
                        <?php echo mailto('shubhamoy@kalakhatta.com', '<i class="icon-user"></i>shubhamoy@kalakhatta.com');?><br />
                        <?php echo anchor('admin/user/logout', '<i class="icon-off"></i>Logout');?><br />
                    </section>
                </div>
            </div>
        </div>
<?php $this->load->view('admin/components/page_tail');?>