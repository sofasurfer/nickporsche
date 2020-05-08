    
    <footer class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-12"><span class="copyright">© Nick Porsche 2020</span></div>
        <div class="col-md-6 col-sm-12">
          <div class="n-connect pull-right">
          <span class="connect">connect:</span>
            <a href="https://open.spotify.com/artist/3BhpfjJZx4BJ24OYtsWMMG" title="Spotify" target="_blank"><i class="fab fa-spotify"></i></a>
            <a href="https://www.facebook.com/nickporschemusic/" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/nickporsche/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCvj2mdgThzJ-4Pc81TrBSiA" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




    <!-- Matomo -->
    <script type="text/javascript">
      var _paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(["setCookieDomain", "*.www.nickporsche.com"]);
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//piwik.sofasurfer.org/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '38']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//piwik.sofasurfer.org/matomo.php?idsite=38&amp;rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Matomo Code -->



    <script>

    window.addEventListener("load", function(){

        var $animation_elements = $('.animation-element');
        var $window = $(window);

        function check_if_in_view() {
          var delay = 200;
          var window_height = $window.height();
          var window_top_position = $window.scrollTop();
          var window_bottom_position = (window_top_position + window_height);

          $.each($animation_elements, function() {

            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);


            //check to see if this current container is within viewport
            if ((element_bottom_position >= window_top_position) &&
              (element_top_position <= window_bottom_position)) {

                setTimeout(function(element) {  
                    $element.addClass('in-view');
                }, delay);
                if( $element.prop("tagName") == 'TR' ){
                   delay = delay + 10;
                }else{
                   delay = delay + 200;
                }
            }

          });
        }

        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');


   
        $('.item-hover').hover( function() {
            $(this).find('.item-hover-caption').fadeIn(300);
        }, function() {
            $(this).find('.item-hover-caption').fadeOut(100);
        });
        $(this).find('.item-hover-caption').fadeIn(300);

    });
    </script>
</body>
</html>