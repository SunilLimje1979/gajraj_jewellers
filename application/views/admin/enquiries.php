<div class="toolbar">
	<a class="admin-btn" href="<?= base_url('admin/enquiries/export') ?>"><i class="fa-solid fa-file-csv"></i>Export CSV</a>
</div>
<section class="panel">
	<div class="table-wrap">
		<table>
			<thead>
				<tr><th>Name</th><th>Contact</th><th>Message</th><th>Status</th><th>Action</th></tr>
			</thead>
			<tbody>
				<?php foreach ($rows as $r): ?>
					<tr>
						<td><?= e($r->name) ?><br><small><?= e($r->created_at) ?></small></td>
						<td><?= e($r->mobile) ?><br><?= e($r->email) ?></td>
						<td><strong><?= e($r->subject) ?></strong><br><?= e($r->message) ?></td>
						<td><span class="status-pill"><?= e($r->status) ?></span></td>
						<td>
							<form class="enquiry-form" method="post" action="<?= base_url('admin/enquiries/update/'.$r->id) ?>">
								<?= csrf_field() ?>
								<select name="status">
									<?php foreach (array('new','contacted','resolved','closed') as $status): ?><option value="<?= e($status) ?>" <?= $r->status === $status ? 'selected' : '' ?>><?= e($status) ?></option><?php endforeach; ?>
								</select>
								<textarea name="internal_note" placeholder="Internal note"><?= e($r->internal_note) ?></textarea>
								<div class="icon-actions">
									<button class="icon-btn" type="submit" title="Update" aria-label="Update"><i class="fa-solid fa-check"></i></button>
									<a class="icon-btn danger" title="Delete" aria-label="Delete" onclick="return confirm('Delete?')" href="<?= base_url('admin/enquiries/delete/'.$r->id) ?>"><i class="fa-solid fa-trash"></i></a>
								</div>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
