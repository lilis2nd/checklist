<!-- Footer -->
<div class="container" id="footer">
	<div class="row text-center">
		<p><small>Copyright&copy; 
		<?php
			$year_default = 2015;
			$year = date("Y");
			if ($year > $year_default) {
				echo "$year_default - $year";
			} else {
				echo "$year_default";
			}
		?> <a href="http://www.astkorea.net" target="_blank">AST Global</a> All rights reserved.</small></p>
	</div>
</div>
</body>