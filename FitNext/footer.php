		<!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; FitNext. All rights reserved.</li>
            </ul>
        </footer>
		
		<!--- Add smooth scrolling n shit --->
		
		<script>
		$(function() {
			$('a[href*=#]:not([href=#])').click(function() {
			  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
				  || location.hostname == this.hostname) {

				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
				  $('html,body').animate({
					scrollTop: target.offset().top
				  }, 1000);
				  return false;
				}
			  }
			});
		  });
		</script>
	</body>
</html>