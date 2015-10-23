/* Filter */
$(document).ready(function() {

var filterContainer = $("#custom_filterContainer");
var conditionList = $("div.conditionList").html();
	conditionList = "<div class='conditionList'>"+ conditionList +"</div> ";
var button = $("div#custom_filterContainer button#go_filter");

// Отфильтровать
filterContainer.find("button#go_filter").on("click", function(){
	
	var search_params = "[["; // 	[[["mailingcity","c","Москва"],["mailingcountry","c","РФ"]]]
	var search_array = []; // Массив параметров поиска
	var field_name = ""; // mailingcity
	var field_criteria = ""; // c
	var field_value = ""; // Москва
	var send_ajax = true;

	$("div#custom_filterContainer div.conditionList").each(function(){
		field_name = $(this).find("select#fields option:selected").data("field-name");
		field_criteria = $(this).find("select#criteria option:selected").val();
		field_value = $(this).find("input#field_value").val();
		
		if(field_name == undefined || field_name == "" || field_criteria == undefined || field_criteria == "" || field_value == undefined || field_value == ""){
			button.after("<div class='error'>Не выбрано условие</div>");
			send_ajax = false;
		} else {
			search_array.push('["'+ field_name +'","'+ field_criteria +'","'+ field_value +'"]'); 
		}
	});

	if(send_ajax == false){
		return false;
	}
	
	filterContainer.find("div.error").remove();

	search_params+= implode(",", search_array) + "]]";
				
	var send_button = $(this);
	send_button.text("Фильтрую...");
	
	$.ajax({
		type: "GET",
		url: "index.php",
		dataType: "HTML",
		data: {
			module: 'Contacts', // Module name
			orderby: "",
			page:   1,
			parent: "",
			search_params: search_params,
			sortorder: "",
			view: "List",
			viewname: 114
		},
		success: function(data){
			$("#listViewContents").html(data);
			send_button.text("Отфильтровать");
		},
		error: function(data){
			console.log("Ajax запрос выполнен неудачно");
		}
	});

});

// Добавить условие
filterContainer.find(".addCondition button").on("click", function(){
	$("div.conditionList").last().after(conditionList);
});

// Удалить
filterContainer.on("click", "i.icon-trash", function(){
	$(this).parent("div.conditionList").remove();
});

}); // end ready()

// Join array elements with a string
function implode( glue, pieces ) {
	return ( ( pieces instanceof Array ) ? pieces.join ( glue ) : pieces );
}