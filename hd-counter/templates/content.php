<?php if ($props['number']) : ?>
<div>
	<?= $props['number'] ?><?= $props['unit'] ? '&nbsp;' . $props['unit'] : '' ?><?= $props['text'] ? ' ' . $props['text'] : '' ?>
</div>
<?php endif ?>
