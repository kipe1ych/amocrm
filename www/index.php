<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Сделки клиентов</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/files/css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
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

    <script src="/files/js/script.js"></script>
</div>
</body>
</html>