$('table').hide();

$('#select').click(
	function()
	{
		IDToShow = $("#select").val();
		$('table').hide();
		$("#" + IDToShow).show();
	}
);