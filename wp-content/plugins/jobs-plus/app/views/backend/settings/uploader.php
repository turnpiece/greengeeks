<h4><?php _e("Which roles can upload sample files & avatar", je()->domain) ?></h4>
<?php $form = new IG_Active_Form($model);
$form->open(array("attributes" => array("class" => "form-horizontal")));?>
<input type="hidden" name="<?php echo $form->build_name('allow_attachment') ?>[]" value="">
<table class="table table-condensed table-hover">
    <thead>
    <tr>
        <th><?php _e("Role name", je()->domain) ?></th>
        <th><?php _e("Can upload", je()->domain) ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $roles = get_editable_roles();
    foreach ($roles as $key => $role): ?>
        <?php $is = in_array($key, $model->allow_attachment); ?>
        <tr>
            <td><?php echo $role['name'] ?></td>
            <td>
                <?php
                $form->checkbox('allow_attachment', array(
                    'multiple' => true,
                    'checked' => $is,
                    'attributes' => array(
                        'value' => $key
                    )
                )) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php wp_nonce_field('je_settings', '_je_setting_nonce') ?>
<button type="submit" class="btn btn-primary"><?php _e("Save Changes", je()->domain) ?></button>
<?php $form->close() ?>