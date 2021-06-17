<h1>Register</h1>

<?php $form = app\core\form\Form::begin('', 'POST'); ?>
    <fieldset class="form-fields">
        <legend class="form-legend">Register using this form</legend>
            <?php echo $form->field($model, 'firstName'); ?>
            <?php echo $form->field($model, 'lastName'); ?>
            <?php echo $form->field($model, 'email')->emailField(); ?>
            <?php echo $form->field($model, 'password')->passwordField(); ?>
            <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
            <button class="form-field__button" type="submit">Submit</button>
    </fieldset>
<?php echo app\core\form\Form::end(); ?>
