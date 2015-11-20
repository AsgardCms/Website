        <footer id="footer">
            <ul class="icons">
                <li><a href="https://twitter.com/AsgardCMS" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
                <li><a href="https://github.com/AsgardCms" class="icon fa-github" target="_blank"><span class="label">Github</span></a></li>
            </ul>
            <ul class="copyright">
                <li>
                    <a href="http://slack.asgardcms.com" target="_blank">Join the conversation on slack!</a>
                </li>
            </ul>
            <ul class="copyright">
                <li>{{ date('Y') }} &copy; Asgard. All rights reserved.</li>
                <li>Proudly built with <a href="http://www.laravel.com" target="_blank">Laravel</a></li>
                <li>Hosted on <a href="http://forge.laravel.com" target="_blank">Laravel Forge</a></li>
            </ul>
            <ul class="copyright">
                <li>Created by <a href="http://nicolaswidart.com">Nicolas Widart</a></li>
		<li>Design: <a href="http://html5up.net" target="_blank">HTML5 UP</a></li>
            </ul>
            <ul class="copyright">
                <li>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="VLYF9MXXVB79A">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </li>
            </ul>
        </footer>

        {!! Theme::script('js/dist/all.min.js') !!}
        @yield('scripts')
        <?php if (App::environment() == 'production'): ?>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-56710105-1', 'auto');
              ga('send', 'pageview');

            </script>
            <!-- Google Tag Manager -->
            <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W4ZN7V"
                              height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-W4ZN7V');</script>
            <!-- End Google Tag Manager -->
        <?php endif; ?>
        <script>
            // Include the UserVoice JavaScript SDK (only needed once on a page)
            UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/RbeyyitSTCIw12dsDYqA.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();

            //
            // UserVoice Javascript SDK developer documentation:
            // https://www.uservoice.com/o/javascript-sdk
            //

            // Set colors
            UserVoice.push(['set', {
                accent_color: '#e2753a',
                trigger_color: 'white',
                trigger_background_color: '#e2753a'
            }]);

            // Identify the user and pass traits
            // To enable, replace sample data with actual user traits and uncomment the line
            UserVoice.push(['identify', {
                //email:      'john.doe@example.com', // User’s email address
                //name:       'John Doe', // User’s real name
                //created_at: 1364406966, // Unix timestamp for the date the user signed up
                //id:         123, // Optional: Unique id of the user (if set, this should not change)
                //type:       'Owner', // Optional: segment your users by type
                //account: {
                //  id:           123, // Optional: associate multiple users with a single account
                //  name:         'Acme, Co.', // Account name
                //  created_at:   1364406966, // Unix timestamp for the date the account was created
                //  monthly_rate: 9.99, // Decimal; monthly rate of the account
                //  ltv:          1495.00, // Decimal; lifetime value of the account
                //  plan:         'Enhanced' // Plan name for the account
                //}
            }]);

            // Add default trigger to the bottom-right corner of the window:
            UserVoice.push(['addTrigger', { mode: 'smartvote', trigger_position: 'bottom-right' }]);

            // Or, use your own custom trigger:
            //UserVoice.push(['addTrigger', '#id', { mode: 'smartvote' }]);

            // Autoprompt for Satisfaction and SmartVote (only displayed under certain conditions)
            UserVoice.push(['autoprompt', {}]);
        </script>
	</body>
</html>
