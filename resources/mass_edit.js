$(document).ready(function() {
	var inputsName = []; // Имена полей
	var sevedRows = {}; // Поля для сохранения

	$("table.listViewEntriesTable tr.listViewHeaders th").each(function(){
		var name = $(this).find("a").data("columnname");
		if(typeof name != "undefined"){
			inputsName.push(name);
		}
	});
		
	// Ссылка "Массовое редактирование"
	$("li[data-type=mass_edit]").click(function(e)
	{
		e.preventDefault();
		
		// Инпуты по строкам
		$("table.listViewEntriesTable tr.listViewEntries").each(function()
		{
			var i = 0;
			$(this).find("td.listViewEntryValue").each(function()
			{
				var text = $(this).text();
				var children = $(this).children();
				if(children.is()){
					children.replaceWith("<input type='text' value='"+ text +"' name='"+ inputsName[i] +"'/>")
				}
				else {
					$(this).wrapInner("<input type='text' value='"+ text +"' name='"+ inputsName[i] +"'/>");
				}
				i++;

				// Запись в массив полей для сохранения
				$(this).find("input").change(function()
				{
					var id = $(this).parents("tr").data("id");
					var text = $(this).val();
					var name = $(this).attr("name");

					if(!sevedRows[id]){
						sevedRows[id] = {id: id};
					}
					sevedRows[id][name] = text;
				});
				
			});
			$(this).attr("class", "");
			
		});
		
		// Кнопка сохранить
		$("button.mass_edit_save").show();
		
		// Скрыть ссылку массовое редактирование
		$(this).hide();
	});
	
	$("button.mass_edit_save").click(function()
	{
		$(this).removeClass("mass_edit_save").text("Идет сохранение...");

		// Отправка запроса в базу и релоад страницы
		var type = "mass_edit_Accounts";
		var model = "accounts";		
		mass_edit(type, sevedRows, model);

		location.reload(); // релоад
		
	});

}); // end ready()

function mass_edit(type, sevedRows, model)
{
	for (var row in sevedRows) {
		row = sevedRows[row];
		var id = row.id;
		
		$.ajax({
			type: "POST",
			url: "/rest_api/"+ model +"/"+ id +"/edit",
			data: {
				type  : type,
				data  : row
			},
			dataType: "JSON",
			cache: false,
			async: false, 
			success: function(data){
				ajax = data;
				if(ajax.mess.length > 0)
				{					
					console.log(ajax.mess);
				}
				else if (ajax.error.length > 0)
				{
					console.log(ajax.error);
				}			},
			error: function(data){
				console.log("Ajax запрос выполнен неудачно");
			}
		});
	}
}