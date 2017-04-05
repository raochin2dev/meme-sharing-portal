$(document).ready(function(){
    
    $('#dataTables-example').DataTable();

    $('#tag1').tagsInput({
	    'width':'200px'
	});

	$('.delete').click(function(){
		if(!confirm("Are you sure ?"))
			event.preventDefault();
	});

});