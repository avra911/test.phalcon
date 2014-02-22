<?php echo $this->tag->form(array('user/login', 'method' => 'post', 'role' => 'form', 'id' => 'login', 'class' => 'form-login validate-placehoder')); ?>
    <h2>Autentificare</h2>
    <div class="form-group">
        <div class="left-inner-addon">
            <span class="glyphicon glyphicon-envelope"></span>
            <?php echo $login_form->render('email_or_phone'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="left-inner-addon">
            <span class="glyphicon glyphicon-lock"></span>
            <?php echo $login_form->render('password'); ?>
        </div>
    </div>
    <div class="checkbox">
        <label>
            <?php echo $login_form->render('remember'); ?> <?php echo $login_form->label('remember'); ?>
        </label>
    </div>
    <div class="row">
        <div class="col-xs-3">
        <input type="hidden" name="<?php echo $tokenKey; ?>" value="<?php echo $token; ?>">
        <?php echo $login_form->render('Sign In'); ?>
        </div>
        <div class="col-xs-9">
            <a class="btn" href="#" role="button">Resetare parola</a>
        </div>
    </div>
</form>