$(document).ready(function() {
	
	$("input[type=checkbox].font-x-small").attr("checked", "checked"); // Шаг 3 ВКЛ
	$("table#duplicates_merge_configuration").show();

	// Начать импорт
	$("form[name=importAdvanced]").ajaxForm({
		beforeSend: function(){
			$("button#importButton").attr("disabled", "disabled").text("Идет импорт...");
			$("a.cancelLink").remove();
			csv_import_check_process();
		},
		success: function(data){
			console.info(data.status);
		},
		error: function(data){
			console.log("Ajax запрос выполнен неудачно");
		}
	});
	
}); // end ready()

// Остановка парсинга
function stop_process(button)
{
	$(button).attr("disabled", "disabled");
	$.ajax({
		type: "GET",
		url: "/rest_api/contacts/stop_process/",
		dataType: "JSON",
		success: function(data){
			if(data.stop == "stop"){
				$(button).text("Импорт остановлен");
			} else {
				$(button).text("Ошибка остановки");
			}
		},
		error: function(data){
			console.log("Ajax запрос выполнен неудачно");
		}
	});
}

// Ход процесса
function csv_import_check_process(){
	$.ajax({
		type: "GET",
		url: "/rest_api/contacts/csv_import_check_process/",
		dataType: "JSON",
		success: function(data){
			// Обновление страницы
			$("div#rightPanel").html(data.html);
			$("html").scrollTop(0);
			
			if(data.stop != "stop"){
				csv_import_check_process();
			}
		},
		error: function(data){
			console.log("Ajax запрос выполнен неудачно");
		}
	});
}