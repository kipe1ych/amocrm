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
        <xmp>
            widgetStylesIntr = function() {
                var widget = this;
                this.code = null;

                this.init = function() {

                }

                this.render = function() {
                    $('.pipeline_status:not(.h-hidden)').eq(2).each(function(index) {
                        let needPlaha = $(this).find('.pipeline_status__head_line');
                        let needTitle = $(this).find('.block-selectable');
                        if(needPlaha.length && needTitle.length) {
                            needTitle.css('color', needPlaha.css('background-color'));
                        }
                    });
                }

                this.bind_actions = function () {
                    $("body").on('mouseup', '.js-linked-with-actions', function (e) {
                        let pei_code = $(this).data("pei-code");
                        if(pei_code == 'phone' || pei_code == 'email') {
                            let tipsItems = $(this).find(".js-tip-items");
                            if(tipsItems.find('[data-type="search"]').length) return;

                            tipsItems.append(`
                                <div class="tips-item js-tips-item js-cf-actions-item " data-type="search" data-id="" data-forced="" data-value="" data-suggestion-type="">
                                    <span class="tips-icon-container">
                                        <span class="tips-icon tips-svg-icon">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="width: 16px; height: 16px;">
                                                <g><path fill="#000000" d="M221.3,246c-3.3,0-6.6-1.4-8.9-4.1l-38.1-44.5c-2.1-2.5-3.1-5.7-2.7-8.9c0.4-3.2,2.1-6.1,4.7-8.1 c20.7-15.3,33.1-39.8,33.1-65.6c0-44.9-36.5-81.5-81.5-81.5c-44.9,0-81.5,36.5-81.5,81.5c0,44.9,36.5,81.5,81.5,81.5 c7.3,0,14.5-1,21.4-2.8c6.3-1.7,12.7,2,14.3,8.2c1.7,6.2-2,12.7-8.2,14.3c-8.9,2.4-18.2,3.7-27.5,3.7c-57.8,0-104.8-47-104.8-104.8 C23,57,70.1,10,127.9,10c57.8,0,104.8,47,104.8,104.8c0,28.9-12.1,56.6-33,76.3l30.4,35.5c4.2,4.9,3.6,12.3-1.3,16.5 C226.7,245,224,246,221.3,246z"/></g>
                                            </svg>
                                        </span>
                                    </span>
                                    Нагуглить
                                </div>`
                            );
                        }
                    });

                    $("body").on('mouseup', '.js-cf-actions-item[data-type="search"]', function (e) {
                        e.stopPropagation();

                        let parent = $(this).parents('.js-linked-with-actions').find('.text-input');

                        let value = parent.val();
                        if(!value) return;

                        let encodedValue = encodeURIComponent(value);
                        let url1 = 'http://letmegooglethat.com/?q=' + encodedValue;
                        let url2 = 'https://yandex.ru/search/?text= ' + encodedValue;

                        window.open(url1, '_blank');
                        window.open(url2, '_blank');
                    });
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
        </xmp>
    </div>
    <script src="/files/js/script.js"></script>
</body>
</html>