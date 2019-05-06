<?php

$cx = $cy = $props['circle_radius'] * 1.1;
$circleWidth = $circleHeight = $cx * 2;
$viewBox = '0 0 ' . $circleWidth . ' ' . $circleWidth;
$uniqid = uniqid('progress-');
$dashOffsetStart = 2 * M_PI * $props['circle_radius'];
$dashOffsetEnd = 2 * M_PI * $props['circle_radius'] * (1 - $props['percentage'] / 100);

$el = $this->el('div', [

	'class' => [
		'counter-container',
		'uk-inline',
	],

	'data-number' => [
		'{number}',
	],

	'data-percentage' => [
		'{percentage}',
	],

	'data-radius' => [
		'{circle_radius}',
	],

	'data-duration' => [
		'{duration}',
	],

]);

$svg = $this->el('svg', [

	'class' => [
		'el-circle',
	],

	'id' => [
		$uniqid,
	],

	'width' => [
		$circleWidth,
	],

	'height' => [
		$circleHeight,
	],

	'viewBox' => [
		$viewBox,
	],

]);

?>
<?= $el($props, $attrs) ?>

	<style>
	#<?= $uniqid ?> .counter-value {
		animation: <?= $uniqid ?> <?= $props['duration'] ?>ms;
	}

	@keyframes <?= $uniqid ?> {
		from {
			stroke-dashoffset: <?= $dashOffsetStart ?>;
		}

		to {
			stroke-dashoffset: <?= $dashOffsetEnd ?>;
		}
	}
	</style>

	<?php if($props['show_circle']) : ?>

	<?= $svg($props) ?>
 		<circle class="counter-meter" cx="<?= $cx ?>" cy="<?= $cy ?>" r="<?= $props['circle_radius'] ?>" stroke-width="<?= $props['circle_stroke_width'] ?>" fill="none" />
		<circle class="counter-value" cx="<?= $cx ?>" cy="<?= $cy ?>" r="<?= $props['circle_radius'] ?>" stroke="<?= $props['circle_color'] ?>" stroke-width="<?= $props['circle_stroke_width'] ?>" fill="none" />
	</svg>

	<div class="<?= $props['text_style'] ?> uk-position-center uk-overlay">
		<span class="el-number"><?= $props['number'] ?></span><?= $props['unit'] ? '&nbsp;<span class="el-unit">' . $props['unit'] . '</span>' : '' ?>
		<?= $props['unit'] ? '<br><span class="el-text">' . $props['text'] . '</span>' : '' ?>
	</div>

	<?php else : ?>

	<div class="<?= $props['text_style'] ?>">
		<span class="el-number"><?= $props['number'] ?></span>&nbsp;<span class="el-unit"><?= $props['unit'] ?></span>
		<br><span class="el-text"><?= $props['text'] ?></span>
	</div>

	<?php endif; ?>

</div>
