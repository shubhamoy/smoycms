<div class="modal-header" align="center">
    <h3><?php echo empty($user->id) ? 'Add a New User' : 'Edit '.$user->name;?></h3>
</div>
<div class="modal-body">
    <?php echo validation_errors();?>
    <?php echo form_open();?>
    <table class="table">
        <tr>
            <td><strong>Name</strong></td>
            <td><?php echo form_input('name', set_value('name', $user->name));?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo form_input('email', set_value('email', $user->email));?></td>
        </tr>
        <tr>
            <td><strong>Password</strong></td>
            <td><?php echo form_password('password');?></td>
        </tr>
        <tr>
            <td><strong>Confirm Password</strong></td>
            <td><?php echo form_password('password_confirm');?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"');?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>