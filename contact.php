<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "server/mysql_func.php";
include "templates/header.php";
include "templates/content_begin.php";
?>
        <h2 >Контактная информация</h2>
        <div class="col col_13">
            <p>Напишите нам</p>
            <div id="contact_form">
                <form  method="post" name="contact" action="#">

                    <label for="author">Имя</label> <input type="text" id="author" name="author" class="required input_field" />
                    <div class="cleaner h10"></div>

                    <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                    <div class="cleaner h10"></div>

                    <label for="subject">Тема</label> <input type="text" name="subject" id="subject" class="input_field" />
                    <div class="cleaner h10"></div>

                    <label for="text">Сообщение</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner h10"></div>

                    <input type="reset" value="Очистить" id="reset" name="reset" class="submit_btn float_l" />
                    <input type="submit" value="Отправить" id="submit" name="submit" class="submit_btn float_r" />

                </form>
            </div>
        </div>
       <div class="col col_13">
            <h5>Мы находимся по адресу:</h5>
            Деревня Ушаково ул.Школьная д.12<br>
			Индекс 607619<br> 
            <strong>Телефон:</strong> 89875406930<br>
            <strong>Email:</strong> rubcov_ura@mail.ru<br>
            <div class="cleaner divider"></div>

            <div class="cleaner h30"></div>       
        </div>
<?php
include "templates/content_end.php";
include "templates/footer.php"
?>
