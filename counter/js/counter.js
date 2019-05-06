var perimeter = null,
	circle = null;

var counters = document.querySelectorAll('.counter-container');

for (var i = 0; i < counters.length; i++) {

	perimeter = 2 * Math.PI * counters[i].dataset.radius;
	circle = counters[i].querySelector('.counter-value');

	circle.style.strokeDashoffset = perimeter * (1 - counters[i].dataset.percentage / 100);
	circle.style.strokeDasharray = perimeter;

	countUp(counters[i].querySelector('.el-number'), 0, counters[i].dataset.number, parseInt(counters[i].dataset.duration));

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