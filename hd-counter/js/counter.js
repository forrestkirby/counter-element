UIkit.util.ready(function() {

	var perimeter = null,
		circle    = null,
		numberEl  = null,
		svg       = null;

	var counters  = document.querySelectorAll('.counter-container');

	for (var i = 0; i < counters.length; i++) {

		UIkit.scrollspy(counters[i], { hidden: false });

		svg = counters[i].querySelector('.el-circle');
		if (svg) { svgId = svg.id; }
		if (svg) { svg.removeAttribute('id'); }

		UIkit.util.on(counters[i], 'inview', function() {

			perimeter = 2 * Math.PI * this.dataset.radius;
			circle    = this.querySelector('.counter-value');
			numberEl  = this.querySelector('.el-number');
			svg       = this.querySelector('.el-circle');

			if (svg) { svg.setAttribute('id', this.dataset.uniqid); }

			if (circle) {
				circle.style.strokeDashoffset = perimeter * (1 - this.dataset.percentage / 100);
				circle.style.strokeDasharray = perimeter;
			}

			if (numberEl) {
				countUp(numberEl, 0, this.dataset.number, parseInt(this.dataset.duration));
			}

		});
	};

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

});