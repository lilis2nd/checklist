<?php
$id = basename(__FILE__, '.php');
?>
<div class="modal fade" tabindex="-1" role="dialog" id="<?php echo $id; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<ul>
					<li>기존 로고:
						<img src="./inc/img/samsung_logo_old.png" class="img-responsive"></li>
					<li>레터마크:
						<img src="./inc/img/samsung_logo_new.png" class="img-responsive"></li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>