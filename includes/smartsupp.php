<?php
$smartsupp_key = trim((string)(getenv('SMARTSUPP_KEY') ?: '6657053d10f0cf7b694bdaba025c6ca860f35579'));
if ($smartsupp_key !== ''):
?>
<script>
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = <?php echo json_encode($smartsupp_key, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    window.smartsupp || (function (d) {
        var s, c, o = smartsupp = function () { o._.push(arguments); }; o._ = [];
        s = d.getElementsByTagName('script')[0]; c = d.createElement('script');
        c.type = 'text/javascript'; c.charset = 'utf-8'; c.async = true;
        c.src = 'https://www.smartsuppchat.com/loader.js?'; s.parentNode.insertBefore(c, s);
    })(document);
</script>
<?php endif; ?>
