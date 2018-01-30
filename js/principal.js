
(function($) {
    $(document).ready(function() {
        $.ajax({
            url: 'https://randomuser.me/api?inc=name,picture,email,phone&nat=us&results=6&noinfo',
            dataType: 'json'
        }).done(function(data) {
            var html = $('#cardProfileTemplate').html(),
                template = Handlebars.compile(html),
                result = template(data);

            $('#profileCardGrid').append(result);
        }).fail(function(msg) {
            alert('Ajax failed with status: ' + msg);
        });
    });
})(jQuery);




// myMenu
