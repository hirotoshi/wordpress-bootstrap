<?php

function wpb_googleanalytics() {
    $web_property_id = get_option('analytics_tracking_id');
?>
<script type="text/javascript">
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?php echo $web_property_id ?>','auto');
ga('require', 'displayfeatures');
ga('require', 'linkid', 'linkid.js');
ga('send', 'pageview');

</script>
<?php
}

//ログインしていないユーザーだけAnalyticsを表示
if ( !is_user_logged_in() ) {
    add_action('wp_head', 'wpb_googleanalytics');
}
