<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход в админку</title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/spiceandpassion.ico'); ?>" type="image/x-icon"/>
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">

    <style>
        body{
            font-family: loraregular;
            font-size: 14px;
            color: #333;
        }
        label{
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }
        p{
            margin: 0 0 10px;
        }
        input{
            display: block;
            width: 400px;
            padding: 6px 12px;
            font-size: 14px;
            color: #555;
            margin: 0;
            background-color: #F5F5F5;
            border-radius: 4px;
            border: 1px solid #BCBBBB;
        }
        #authorization_error{
            color: #a94442;
            background-color: #f2dede;
            border-radius: 4px;
            padding: 8px;
            width: 410px;
            margin: 20px 0;
        }
        .btn-primary {
            background: linear-gradient(to top, #00ACFF, #00F2FE);
            border-color: #00ACFF;
            color: #fff;
            cursor: pointer;
            width: 124px;
        }
        .btn-primary:hover {
            background: linear-gradient(to top, #00F2FE, #00ACFF);
            border-color: #00ACFF;
            color: #fff;
        }
        .login_view{
            margin: 300px auto 0 auto;
            width: 410px;
        }
    </style>
</head>
<body>
<section>
    <div class="login_view">
        <? if (isset($error)): ?>
            <div id="authorization_error">
                <?= $error; ?>
            </div>
        <? endif; ?>
        <?php echo form_open('/admin/login/'); ?>
        <div>
            <span><label for="login">Логин</label></span>

            <p><input type="text" name="login" id="login" value=""/></p>

            <span><label for="pass">Пароль</label></span>

            <p><input type="password" name="pass" id="pass" value=""/></p>

            <p><input type="submit" name="enter" value="Войти" class="btn-primary"/></p>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
</body>
</html>

