/**
 * 
 */

$(function()
{
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();
	$('.modal-trigger').leanModal();
	$('select').material_select();
	$('.etat_validee').on('click',function()
	{
		var formation_salarie = $(this).parent().attr('id');
		var informations = formation_salarie.split("|");
		var id_salarie = informations[1];
		var id_formation = informations[2];
		
		$.ajax(
				{
					url: 'models/validation_formation.php',
					type: 'POST',
					data: {'id_salarie': id_salarie, 'id_formation': id_formation},
					success: function(data)
					{
						
					},
					error: function()
					{
						alert("erreur");
					}
				});
		
		$(this).parent().hide("5000");
	});
	
	
	$('.etat_refusee').on('click',function()
	{
		var formation_salarie = $(this).parent().attr('id');
		var informations = formation_salarie.split("|");
		var id_salarie = informations[1];
		var id_formation = informations[2];
		
		$.ajax(
				{
					url: 'models/refus_formation.php',
					type: 'POST',
					data: {'id_salarie': id_salarie, 'id_formation': id_formation},
					success: function(data)
					{
						$.ajax(
								{
									url: 'models/ajout_capital.php',
									type: 'POST',
									data: {'id_salarie': id_salarie, 'id_formation': id_formation},
									success: function(data)
									{
										
									}
								});
					}
				});
		
		$(this).parent().hide("5000");
	});
	
	
	
	
});