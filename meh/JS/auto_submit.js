window.onload = function() {
	// Form Submitting after 20s
	var auto_refresh = setInterval(function() {
		submitform();
	}, 10000);
	// Form submit function
	function submitform() {
		document.getElementById("searchForm").submit();
	}
	// To validate form fields before submission

};
$('#searchForm').submit(function () {
	 return false;
	});