$( document ).ready(function() {
    $("#module_window_btn").click(
        function(){
            document.getElementById('module_wrapper').style.display = 'none';
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
    $("#register_btn").click(
        function(){
            if (!passwordCorrect()) return false;
            sendAjaxForm('module_window_info', 'register_form', 'save.php');
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
                showMessage(response);
                return;
            } 
            window.location.reload();
    	},
        error: function(response) { // Данные не отправлены
            showMessage("Ошибка. Данные не отправлены.");
    	}
     });
}

function showMessage(message)
{
    document.getElementById('module_wrapper').style.display ='block';
    document.getElementById('module_window').style.display = 'block';
    document.getElementById('module_window_info').innerHTML = ("Иосиф Виссарионович говорит, что " + message); 
}

function passwordCorrect(){
    var password_first = $("#reg_password").val();
    var password_second = $("#reg_reppassword").val();

    if (password_first != password_second){
        showMessage("пароли не совпадают!")
        return false;
    } 
    if (password_first.length < 8)
    {
        showMessage("с таким паролем тебя даже естонец взломает! Набери хоть 8 символов!");
        return false;
    }

    return true;
}