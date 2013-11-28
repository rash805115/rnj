function showCat()
{
	IDToShow = $("#select").val();

	if(IDToShow == -1)
	{
		$('table').show();
	}
	else
	{
		$('table').hide();
		$("#" + IDToShow).show();
	}
}

showCat();

$('#select').click(
	function()
	{
		showCat();
	}
);