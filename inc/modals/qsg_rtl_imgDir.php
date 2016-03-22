<?php
$id = basename(__FILE__, '.php');
?>
<div class="modal fade" tabindex="-1" role="dialog" id="<?php echo $id; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<ul>
					<li>LTR:
						<img src="./inc/img/rtl_image_order_ltr.png" class="img-responsive"></li>
					<li>RTL:
						<img src="./inc/img/rtl_image_order_rtl.png" class="img-responsive"></li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>