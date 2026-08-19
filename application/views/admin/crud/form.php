<form class="panel admin-form" method="post" enctype="multipart/form-data"><?= csrf_field() ?>
    <div class="form-grid">
        <?php foreach ($fields as $name => $meta):
            $value = $row ? ($row->$name ?? '') : ''; ?><label class="<?= $meta['type'] === 'html' ? 'form-field-wide' : '' ?>"><?= e(ucwords(str_replace('_', ' ', $name))) ?><?php if ($meta['type'] === 'textarea'): ?><textarea
                        name="<?= $name ?>"><?= e($value) ?></textarea><?php elseif ($meta['type'] === 'html'): ?><textarea
                        class="rich"
                        name="<?= $name ?>"><?= e($value) ?></textarea><?php elseif ($meta['type'] === 'select'): ?><select
                        name="<?= $name ?>"><?php foreach ($meta['options'] as $opt): ?>
                            <option value="<?= e($opt) ?>" <?= (string) $value === (string) $opt ? 'selected' : '' ?>><?= e($opt) ?>
                            </option>
                        <?php endforeach; ?>
                    </select><?php elseif (in_array($meta['type'], array('image', 'file', 'icon'), TRUE)): ?><input type="file"
                        name="<?= $name ?>" <?php if ($meta['type'] === 'icon'): ?>accept=".png,.svg,.ico,image/png,image/svg+xml,image/x-icon"<?php elseif ($meta['type'] === 'image'): ?>accept="image/*"<?php elseif ($meta['type'] === 'file'): ?>accept="application/pdf"<?php endif; ?>><?php if ($value): ?><small>Current:
                            <?= e($value) ?></small><?php endif; ?><?php else: ?><input type="<?= e($meta['type']) ?>"
                        name="<?= $name ?>" value="<?= e($value) ?>"><?php endif; ?></label><?php endforeach; ?>
    </div><button class="admin-btn">Save</button>
</form>
