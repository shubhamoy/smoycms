<?php $this->load->view('admin/components/page_head');?>

<body style="background: #CCC;">
    <div class="modal show" role="dialog">
        <?php $this->load->view($subview);?>
        <div class="modal-footer">&copy;<?php echo date('Y ').$meta_title; ?></div>
    </div>


<?php $this->load->view('admin/components/page_tail');?>