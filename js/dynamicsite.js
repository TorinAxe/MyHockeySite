
$( document ).ready(function() {
    $("module_window_btn").click(function(){
        document.getElementById('#module_window').style.display = 'none';
        $(this).html('');
    });
    $("#login_btn").click(
		function(){
			sendAjaxForm('module_window_info', 'login_form', 'check.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(module_window, ajax_form, url) {
    $.ajax({
        url:       url,
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            document.getElementById('#module_window').style.display = 'block';
        	$('#module_window').html(response);
    	},
        error: function(response) { // Данные не отправлены
            document.getElementById('#module_window').style.display = 'block';
            $('#module_window_info').html('Ошибка. Данные не отправлены.');
    	}
     });
}

