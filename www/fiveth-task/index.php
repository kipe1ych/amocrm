<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Интеграция сайта и amoCRM</title>
    <?require_once($_SERVER['DOCUMENT_ROOT'].'/head.php')?>
</head>
<body>
    <div class="wrapper">
        <a class="btn btn-primary" href="/" role="button">&#8592;&nbsp;Назад</a>
        <h1 class="mb-4">Интеграция сайта и amoCRM</h1>
        <form class="js-forms" method="POST" id="form1" action='/introvert_save.php'>
            <input type="hidden" name="id" value="form1">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Ivan Ivanov">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput2" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Телефон</label>
                <input type="text" class="form-control" name="phone" id="exampleFormControlInput3" placeholder="+79999999999">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <form class="mt-5 pb-5 js-forms" method="POST" id="form2" action='/introvert_save.php'>
            <input type="hidden" name="id" value="form2">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Имя</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Ivan Ivanov">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Телефон</label>
                <input type="text" class="form-control" name="phone" id="exampleFormControlInput3" placeholder="+79999999999">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <div id="form-result" style="display: none; margin-top: 20px;" class="alert alert-success">
            Все успешно отправлено!
        </div>
    </div>
    <script src="/files/js/script.js"></script>
    <script>
        $(document).ready(function () {
            $('.js-forms').on('submit', function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
    (function(d, w, k) {
        w.introvert_callback = function() {
            try {
                w.II = new IntrovertIntegration(k);
            } catch (e) {console.log(e)}
        };

        var n = d.getElementsByTagName("script")[0],
            e = d.createElement("script");

        e.type = "text/javascript";
        e.async = true;
        e.src = "https://api.yadrocrm.ru/js/cache/"+ k +".js";
        n.parentNode.insertBefore(e, n);
    })(document, window, '3363f0c5');
    </script>
</body>
</html>