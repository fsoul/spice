    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/modernizr.custom.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.ui.widget.js"></script>
    <script src="/assets/js/load-image.all.min.js"></script>
    <script src="/assets/js/canvas-to-blob.min.js"></script>
    <script src="/assets/js/jquery.iframe-transport.js"></script>
    <script src="/assets/js/jquery.fileupload.js"></script>
    <script src="/assets/js/jquery.fileupload-process.js"></script>
    <script src="/assets/js/jquery.fileupload-image.js"></script>
    <script src="/assets/js/blueimp-gallery.min.js"></script>
    <script src="/assets/js/masonry.pkgd.min.js"></script>
    <script src="/assets/js/imagesloaded.js"></script>
    <script src="/assets/js/classie.js"></script>
    <script src="/assets/js/AnimOnScroll.js"></script>
    <script src="/assets/js/notify.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <? if(isset($lang) && $lang != 'en'):?>
    <script src="/assets/js/messages_<?= $lang; ?>.min.js"></script>
    <? endif; ?>
    <script src="/assets/js/ajax.js"></script>
    <script src="/assets/js/script.js"></script>
    <? if(isset($current_controller) && $current_controller == 'recipes'): ?>
    <script src="/assets/js/recipes-scroll.js"></script>
    <? endif; ?>
    </body>
</html>