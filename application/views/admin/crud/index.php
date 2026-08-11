<div class="toolbar">
	<a class="admin-btn" href="<?= base_url($base.'/create') ?>"><i class="fa-solid fa-plus"></i>Add New</a>
</div>
<section class="panel">
	<div class="table-wrap">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<?php foreach (array_slice(array_keys($fields), 0, 4) as $f): ?><th><?= e(ucwords(str_replace('_', ' ', $f))) ?></th><?php endforeach; ?>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rows as $r): ?>
					<tr>
						<td><?= (int) $r->id ?></td>
						<?php foreach (array_slice(array_keys($fields), 0, 4) as $f): ?><td><?= isset($r->$f) && !is_string($r->$f) ? '' : e(character_limiter(strip_tags($r->$f ?? ''), 60)) ?></td><?php endforeach; ?>
						<td><span class="status-pill"><?= e($r->status ?? '') ?></span></td>
						<td>
							<div class="icon-actions">
								<a class="icon-btn" title="Edit" aria-label="Edit" href="<?= base_url($base.'/edit/'.$r->id) ?>"><i class="fa-solid fa-pen"></i></a>
								<a class="icon-btn danger" title="Delete" aria-label="Delete" onclick="return confirm('Delete this record?')" href="<?= base_url($base.'/delete/'.$r->id) ?>"><i class="fa-solid fa-trash"></i></a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
