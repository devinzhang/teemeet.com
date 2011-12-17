
$(document).ready(function() {
    
    //group dues
	if($('#edit-refunds-policy-1').attr('checked'))
			$('#-groupextension-tools-group-dues-form .sub_element').show();
	else
		$('#-groupextension-tools-group-dues-form .sub_element').hide();
	
	$('#edit-refunds-policy-1').click(function() {
		if($('#edit-refunds-policy-1').attr('checked'))
			$('#-groupextension-tools-group-dues-form .sub_element').show();
		else
			$('#-groupextension-tools-group-dues-form .sub_element').hide();
	})
	
   $('#edit-refunds-policy-0').click(function() {
		if($('#edit-refunds-policy-1').attr('checked'))
			$('#-groupextension-tools-group-dues-form .sub_element').show();
		else
			$('#-groupextension-tools-group-dues-form .sub_element').hide();
	})
	
	// money
	$('#adder').click(function(){
		$("#addMenu").toggle();
	})
	
	$('#addActions').mouseout(function(){
		$('#addMenu').hover(
			function () {
			$("#addMenu").show();
		  },
		  function () {
			$('#addMenu').hide();
		  }
		);
	})
	
	/*connect($("#adder"),"onclick",function(){
		$("#addMenu").style.display = (!$("#addMenu").style.display || $("#addMenu").style.display == "none" ? "block" : "none");
		$("#adder").style.display='block';
	});
	connect($("#addActions"),"onmouseleave",function(){
		$("#addMenu").style.display = "none";
		$("#adder").style.display='block';
	});*/
});

