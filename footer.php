<?php 
/*
|--------------------------------------------------------------------------
| Wordpress theme > footer.php
|--------------------------------------------------------------------------
*/
?>
    <footer class="footer">
        
    </footer><!-- .footer -->

    <?php
    wp_footer();
    ?>

    <!-- scripts -->
    <script src="<?=bloginfo('template_url')?>/assets/js/vendor/vendor.min.js"></script>
    <script src="<?=bloginfo('template_url')?>/assets/js/main.js"></script>

    <!-- google analytics -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-1052924-11', 'auto');
    ga('send', 'pageview');
    </script>
</body>
</html>
