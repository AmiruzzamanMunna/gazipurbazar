$(document).ready(function() {
	$('#img1').change(function (event) {
  	  var output = $("#src1")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});
	$('#img2').change(function (event) {
  	  var output = $("#src2")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});
	$('#img3').change(function (event) {
  	  var output = $("#src3")[0];
    	output.src = URL.createObjectURL(event.target.files[0]);
	});
});