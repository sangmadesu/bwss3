$(document).ready(function(){	

	$('#saveMenuOrder').on('click', function(){
	  	$.post("/admin/menus/sort", {menuIds: ids}).done(function(data) {
	  		console.log(data);
	  		location.reload(); 
	  	});
	});
	
	var ids;
	
	var updateOutput = function(e) {
		var list = e.length ? e : $(e.target),
		output = list.data('output');
		if(window.JSON) {
		  	ids = list.nestable('serialize');
		} else {
		  	output.val('JSON browser support required');
		}
	}
	
	$('#nestable').nestable({
	  	group:1,
	  	maxDepth:2
	})
	.on('change', updateOutput);
	updateOutput($('#nestable').data('output', $('#nestable-output')));
	
});