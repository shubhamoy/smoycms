<div class="modal-header" align="center">
    <h3>Log in</h3>
</div>
<div class="modal-body">
    <?php //echo '<pre>'.print_r($this->session->userdata, TRUE).'</pre>'; ?>
    <?php echo validation_errors();?>
    <?php echo form_open();?>
    <table class="table">
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo form_input('email');?></td>
        </tr>
        <tr>
            <td><strong>Password</strong></td>
            <td><?php echo form_password('password');?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Login', 'class="btn btn-primary"');?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>