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
				var type = $(this).data("field-type");
				var text_size = text.length + 5;
				if(children.is()){
					children.replaceWith("<input size='"+ text_size +"' type='text' value='"+ text +"' name='"+ inputsName[i] +"'/>")
				}
				else {
					if(type == "boolean"){
						if(text == "Да"){
							text = "checked";
						} else {
							text = "";
						}
						$(this).wrapInner("<input type='checkbox' "+ text +" value='' name='"+ inputsName[i] +"'/>");
					} else if(type == "currency"){
						text = text.replace("руб", "");
						text_size = text_size - 5;
						$(this).wrapInner("<input size='"+ text_size +"' type='text' value='"+ text +"' name='"+ inputsName[i] +"'/>");
					} else {
						$(this).wrapInner("<input size='"+ text_size +"' type='text' value='"+ text +"' name='"+ inputsName[i] +"'/>");
					}
				}
				i++;

				// Запись в массив полей для сохранения
				$(this).find("input").change(function()
				{
					var id = $(this).parents("tr").data("id");
					var text = $(this).val();
					var name = $(this).attr("name");

					// Checkbox
					if($(this).attr("type") == "checkbox"){
						if($(this).attr("checked") == "checked"){
							text = 1;
						} else {
							text = 0;
						}
					}

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
		var module = $_GET().module;		
		mass_edit(sevedRows, module);

		location.reload(); // релоад
		
	});

}); // end ready()

// Ajax запрос на массовое редактирование
function mass_edit(sevedRows, module)
{
	for (var row in sevedRows) {
		row = sevedRows[row];
		var id = row.id;
		
		$.ajax({
			type: "POST",
			url: "/rest_api/"+ module +"/"+ id +"/edit",
			data: {
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

// Получить GET параметры
function $_GET(){
	var urlVar = window.location.search; // получаем параметры из урла
	var arrayVar = [];
	var valueAndKey = [];
	var resultObject = {};
	arrayVar = (urlVar.substr(1)).split('&'); // разбираем урл на параметры
	if(arrayVar[0]=="") return false; // если нет переменных в урле
	for (i = 0; i < arrayVar.length; i ++) {
		valueAndKey = arrayVar[i].split('=');
		resultObject[valueAndKey[0]] = valueAndKey[1].toLowerCase();
	}
	return resultObject;
}