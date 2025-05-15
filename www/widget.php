<script type="text/javascript">
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
</script>