<div class="container">
    <h2>Введите данные для входа</h2>
    <hr/>
    <div class="row">
        <? if (isset($error)): ?>
            <div id="authorization_error" class="col-md-4 col-md-offset-4 alert alert-danger">
                <?= $error; ?>
            </div>
        <? endif; ?>
        <?php echo form_open('/admin/login/'); ?>
        <div class="col-md-4 col-md-offset-4">
            <span><label for="login">Логин</label></span>

            <p><input class="form-control" type="text" name="login" id="login" value=""/></p>

            <span><label for="pass">Пароль</label></span>

            <p><input class="form-control" type="password" name="pass" id="pass" value=""/></p>

            <p><input type="submit" name="enter" value="Войти" class="btn btn-primary"/></p>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
