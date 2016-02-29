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

		<!-- JS sources -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../bs/js/bootstrap.min.js"></script>
	</body>
</html>