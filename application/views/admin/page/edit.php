<div class="container">
    <h3><?php echo empty($page->id) ? 'Add a New page' : 'Edit '.$page->title;?></h3>
</div>
<div class="container">
    <?php echo validation_errors();?>
    <?php echo form_open();?>
    <table class="table">
        <tr>
            <td style="border-top:none;"><strong>Title</strong><br /><?php echo form_input('title', set_value('title', $page->title), 'class="input-block-level" placeholder="Enter the Title"');?></td>
        </tr>
        <tr>
            <td style="border-top:none;"><strong>Slug</strong><br /><?php echo form_input('slug', set_value('slug', $page->slug), 'class="input-block-level" placeholder="Enter the Slug"');?></td>
        </tr>
        <tr>
            <td style="border-top:none;"><strong>Content</strong><br /><?php echo form_textarea('body', set_value('body', $page->body), 'class="input-block-level xxlarge" placeholder="Enter the content"');?></td>
        </tr>
        <tr>
            <td style="border-top:none;"><?php echo form_submit('submit', 'Save', 'class="btn btn-large btn-primary"');?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>