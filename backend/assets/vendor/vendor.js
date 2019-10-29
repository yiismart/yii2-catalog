var vendor = {
    init: function() {
        $('#make-alias').on('click', this.make_alias);
    },
    make_alias: function() {
        var $button = $(this), $input = $('#vendorform-alias');
        if ($input.hasClass('state-loading')) {
            return;
        }
        $input.addClass('state-loading');
        $.get($button.data('url'), {s: $('#vendorform-title').val()}, function(data) {
            $input.val(data).removeClass('state-loading');
        }, 'json');
    }
};

vendor.init();
