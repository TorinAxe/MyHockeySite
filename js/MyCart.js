function addToCart(id){
    console.log('add ' + id);
    var res =  $.ajax({
        async: true,
        type: "POST",
        url: "cart.php",
        dataType:"text",
        data: 'action=add&id=' + id,
        error: function () {
            alert( "Не смог" );
        },
        success: function () {
            showMessage("Товар добавлен");
        }
    });
}

function showMyCart(){
    console.log('show ');
    $.ajax({
        async: true,
        type: "POST",
        url: "cart.php",
        data: "action=show",
        dataType:"text",
        error: function () {
            alert( "Произошла ошибка при добавлении товара" );
        },
        success: function (response) {
            $('#in-check').html(response);
        }
    });
}

function delFromCart(id){
    console.log('del ' + id);
    $.ajax({
        async: true,
        type: "POST",
        url: "cart.php",
        data: 'action=del&id=' + id,
        dataType:"text",
        error: function () {
            alert( "Произошла ошибка при удаление товара" );
        },
        success: function (response) {
            showMyCart();
            console.log(response);
        }
    });
}