<!-- Footer -->
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
<footer>
	<div class="uk-grid" id="footer">
		<div class="uk-width-1-1 uk-text-center uk-text-middle">
			<p><small>Copyright&copy; <?php copyright(2015); ?> <a href="http://www.astkorea.net" target="_blank">AST Global</a> All rights reserved.</small></p>
		</div>
	</div>
</footer>
</body>
</html>