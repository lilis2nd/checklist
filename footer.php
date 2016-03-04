		<footer>
		<?php
		function copyright($default) {
			$current = date("Y");
			if ($current > $default) {
				echo "$default&ndash;$current";
			} else {
				echo "$default";
			}
		}
		?>
			<!-- Copyright -->
			<div class="container" id="footer">
				<div class="row text-center">
					<p><small>Copyright &copy; <?php copyright(2015); ?> <a href="http://www.astkorea.net" target="_blank">AST Global</a> All rights reserved.</small></p>
				</div>
			</div>
		</footer>
	</body>
</html>