jQuery(document).ready(function ($) {
    $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
            var data = $(this);
            return $.ajax({
                url: '/text/text/ajax',
                dataType: 'html',
                method: 'POST',
                async: false,
                data: {
                    slug: data.data('slug'),
                }
            }).responseText;
        }
    });
});