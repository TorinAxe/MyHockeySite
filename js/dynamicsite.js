$( document ).ready(function() {
    $("#module_window_btn").click(
        function(){
            document.getElementById('module_window').style.display = 'none';
            document.getElementById('module_window_info').innerHTML = '';
        }
    );

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
            //result = $.parseJSON(response);
            if (response != "Joined")
            {
                document.getElementById('module_window').style.display = 'block';
                document.getElementById('module_window_info').innerHTML = response; 
                return;
            } 
            window.location.reload();
    	},
        error: function(response) { // Данные не отправлены
            document.getElementById('module_window').style.display = 'block';
            document.getElementById('module_window_info').innerHTML = "Ошибка. Данные не отправлены.";
    	}
     });
}

