function countUp(el, start, end, duration) {

	var range = end - start;
	var stepTime = Math.abs(Math.floor(duration / range));

	var startTime = new Date().getTime();
	var endTime = startTime + duration;
	var timer;

	function count() {
		var now = new Date().getTime();
		var remaining = Math.max((endTime - now) / duration, 0);
		var value = Math.round(end - (remaining * range));
		el.innerHTML = value;
		if (value == end) {
			clearInterval(timer);
		}
	}

	timer = setInterval(count, stepTime);
	count();
}

function startAnimation() {

	var counters = document.querySelectorAll('.counter-container');

	for (var i = 0; i < counters.length; i++) {

		var el = counters[i];

		if (!el.getAttribute('data-animated') && UIkit.util.isInView(el)) {

			var perimeter = 2 * Math.PI * el.dataset.radius,
			    circle    = el.querySelector('.counter-value'),
			    numberEl  = el.querySelector('.el-number'),
			    svg  = el.querySelector('.el-circle');

			if (svg) { svg.setAttribute('id', el.dataset.uniqid); }

			if (circle) {
				circle.style.strokeDashoffset = perimeter * (1 - el.dataset.percentage / 100);
				circle.style.strokeDasharray = perimeter;
			}

			if (numberEl) {
				countUp(numberEl, 0, el.dataset.number, parseInt(el.dataset.duration));
			}

			el.setAttribute('data-animated', true);

		}

	}

};

UIkit.util.ready(function() {
	UIkit.util.$$('.counter-container').forEach(function(el) {
		var svg = el.querySelector('.el-circle');
		if (svg) { svg.removeAttribute('id'); }
	});
	startAnimation();
	window.addEventListener('scroll', startAnimation, false);
	window.addEventListener('resize', startAnimation, false);
});
