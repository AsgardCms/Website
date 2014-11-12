        <footer id="footer">
            <ul class="icons">
                <li><a href="https://twitter.com/nicolaswidart" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
                <li><a href="https://github.com/AsgardCms" class="icon fa-github" target="_blank"><span class="label">Github</span></a></li>
            </ul>
            <ul class="copyright">
                <li>{{ date('Y') }} &copy; Asgard. All rights reserved.</li>
            </ul>
        </footer>

        @yield('scripts')
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-56710105-1', 'auto');
          ga('send', 'pageview');

        </script>
	</body>
</html>
