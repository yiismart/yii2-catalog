var vendor = {
    init: function() {
        $('#make-url').on('click', this.make_url);
    },
    make_url: function() {
        var $button = $(this), $input = $('#vendorform-url');
        if ($input.hasClass('state-loading')) {
            return;
        }
        $input.addClass('state-loading');
        console.log($button.data('url'));
        $.get($button.data('url'), {title: $('#vendorform-title').val()}, function(data) {
            $input.val(data).removeClass('state-loading');
        }, 'json');
    }
};

vendor.init();
