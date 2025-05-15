<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Виджеты</title>
    <?require_once($_SERVER['DOCUMENT_ROOT'].'/head.php')?>
</head>
<body>
    <div class="wrapper">
        <a class="btn btn-primary" href="/" role="button">&#8592;&nbsp;Назад</a>
        <h1 class="mb-4">Виджеты</h1>
        <pre>
            widgetStylesIntr = function() {
                var widget = this;
                this.code = null;

                this.init = function() {

                }

                this.render = function() {
                    console.log("render start");
                    $('.pipeline_status:not(.h-hidden)').eq(2).each(function(index) {
                        let needPlaha = $(this).find('.pipeline_status__head_line');
                        let needTitle = $(this).find('.block-selectable');
                        if(needPlaha.length && needTitle.length) {
                            needTitle.css('color', needPlaha.css('background-color'));
                        }
                    });
                }

                this.bind_actions = function () {
                    
                }

                this.bootstrap = function (code) {
                    widget.code = code;
                    var status = 1;

                    if(status) {
                        widget.init();
                        widget.render();
                        widget.bind_actions();

                        $(document).on('widgets:load', function () {
                            widget.render();
                        });
                    }
                }
            }

            yadroWidget.widgets['styles-widget'] = new widgetStylesIntr();
            yadroWidget.widgets['styles-widget'].bootstrap('styles-widget');





            test_yadro_start('styles-widget');
        </pre>
    </div>
    <script src="/files/js/script.js"></script>
</body>
</html>