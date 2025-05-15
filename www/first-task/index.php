<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Сделки клиентов</title>
    <?require_once($_SERVER['DOCUMENT_ROOT'].'/head.php')?>
</head>
<body>
    <div class="wrapper">
        <a class="btn btn-primary" href="/" role="button">&#8592;&nbsp;Назад</a>
        <h1 class="mb-4">Сделки клиентов</h1>
        <div class="table-responsive">
            <table class="table table-striped" id="deals-table">
                <thead>
                <tr>
                    <th>ID клиента</th>
                    <th>Название клиента</th>
                    <th>Сумма сделок</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="alert alert-success">
            Общая сумма: <span id="total-sum"><span class="spinner-border spinner-border-sm" role="status"></span></span>
        </div>

    </div>
    <script src="/files/js/script.js"></script>
</body>
</html>