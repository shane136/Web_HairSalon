<div class="modal fade" id="update_modal<?php echo $data['account_id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="\Web_HairSalon\conn\customer_account_update.php">
				<div class="modal-header">
					<h3 class="modal-title"> Account ID: <?php echo $data['account_id'] ?></h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Adding Amount Balance</label>
							<input type="hidden" name="account_id" value="<?php echo $data['account_id']?>"/>
							<input type="text" name="Amount" value="" class="form-control" placeholder="Input Amount" required="required"/>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
