<?php
$project_link = get_option('default_project_link');
$project_link_label = get_option('default_project_link_label');
$view = get_view();
?>

<div class="field">
    <h3>Project Link</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('project_link', $project_link, array('rows' => '1', 'cols' => '30', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Edit this statement to include a custom to a web based project guide.
        </p>
    </div>
</div>

<div class="field">
    <h3>Project Link Label</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('project_link_label', $project_link_label, array('rows' => '1', 'cols' => '30', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Edit this value to specify the label used for the link to the project guide.
        </p>
    </div>
</div>

