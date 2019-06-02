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
            sendAjaxForm('module_window_info', 'login_form', 'server/check.php');
            return false;
        }
    );
    $("#register_btn").click(
        function(){
            if (!passwordCorrect()) return false;
            sendAjaxForm('module_window_info', 'register_form', 'server/save.php');
            return false;
        }
    );
    $("#pass_btn").click(
        function(){
            if (!passwordCorrect()) return false;
            sendAjaxForm('module_window_info', 'pas_form', 'server/formPass.php');
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

/*Work with user Cart*/
function addToCart(id)
{
    $.get(
        'server/cart_administrator.php',
        {
            command:"addToCart",
            item_id: id
        },
        showMessage
    );
}

function showMyCart()
{
    $.get(
        'server/cart_administrator.php',
        {command:"showMyCart"},
        (data, textStatus) => {$('#in-check').html(data)}
    );
}

function delFromCart(element, id)
{
    $.get(
        'server/cart_administrator.php',
        {
            command:"delFromCart",
            item_id: id
        },

        (data, textStatus) =>
        {
            switch (textStatus)
            {
                case 'success':
                {
                    let line = element.parentElement.parentElement;
                    let table = line.parentElement;
                    table.removeChild(line);
                    CalculateOrder();
                    showMessage("Toвар Успешно Удален!");
                    break;
                }
                default:
                    showMessage("Приоизошла ошибка при удалении товара!");
            }

        }
    );
}

function onCountItemsChange(elem)
{
    //call iax
    CalculateOrder();
}

function CalculateOrder()
{
    let order_items = document.getElementsByClassName("order_item");
    let totalPayment = 0;
    for(let i = 0; i < order_items.length; i++)
    {
        let item = order_items[i];
        let itemCount = (item.getElementsByClassName("count"))[0].valueAsNumber;
        let itemCost  = item.getElementsByClassName("product_price")[0].textContent;
        totalPayment += parseInt(itemCost) * itemCount;
    }

    document.getElementById("orderCost").innerText = "Итого к оплате: " + totalPayment;
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

function specify_filter_handler() {
   var filter = document.getElementById("filter");
   if (filter.checked){
       document.getElementById("filter_option").style.display = "block";
   }
   else{
       document.getElementById("filter_option").style.display = "none";
   }
}

function range_handler(range)
{
    var value = range.value;
    var percentage = (value - range.min) / (range.max - range.min) * 100;
    range.style.background = ("-webkit-linear-gradient(left ,orangered 0%, orangered " + percentage + "%,#fff "  + percentage + "%, #fff 100%)");
    var value_shower = document.getElementById("filter_option_cost");
    value_shower.innerHTML = value;
    
}

$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        if ($('#back-top').is(':hidden')) {
            $('#back-top').css({opacity : 1}).fadeIn('slow');
        }
    } else { $('#back-top').stop(true, false).fadeOut('fast'); }
});
$('#back-top').click(function() {
    $('html, body').stop().animate({scrollTop : 0}, 300);
});