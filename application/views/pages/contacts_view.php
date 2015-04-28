<div id="contacts_main" xmlns="http://www.w3.org/1999/html">
    <div id="left_bord" class="about_border"></div>
    <div class="contacts_left_block pull-left">
        <p class="c_label"><?= $name[$lang]; ?>:</p>
        <p class="c_name"><?= $author[$lang]; ?></p>
        <p class="c_label"><?= $email[$lang]; ?>:</p>
        <p class="c_link"><?= $mail; ?></p>
        <p class="c_label"><?= $phone[$lang]; ?>:</p>
        <p class="c_link"><?= $number; ?></p>
        <p class="c_label"><?= $fb[$lang]; ?>:</p>
        <p class="c_link"><a target="_blank" href="https://www.facebook.com/<?= $link; ?>"><?= $link; ?></a></p>
        <p class="c_label"><?= $ok[$lang]; ?>:</p>
        <p class="c_link"><a target="_blank" href="http://ok.ru/<?= $link; ?>"><?= $link; ?></a></p>
    </div>
    <div class="c_callback_form pull-left">
            <p class="contact_me"><?= $contact_me[$lang]; ?></p>
            <form class="c_form" method="post" action="/contacts/send">
                <p>
                    <input class="c_input" placeholder="<?= $name[$lang];?>" type="text" name="c_name" required/>
                </p>
                <p>
                    <input class="c_input" placeholder="<?= $email[$lang]; ?>" type="email" name="c_mail" required/>
                </p>
                <p>
                    <textarea class="c_msg" placeholder="<?= $msg[$lang]; ?>" name="c_msg" required></textarea>
                </p>
                <input class="c_submit" type="submit" value="<?= $send[$lang]; ?>"/>
            </form>
    </div>
    <div id="right_bord" class="about_border"></div>
    <div class="clearfix"></div>
</div>