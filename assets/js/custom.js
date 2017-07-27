$(window).on('load', function(){
    $('.ajax-form').on('submit', function(e){
        e.preventDefault();
        console.log();
        goAjax(
            'POST',
            $(this).attr('action'),
            $(this).serialize()
        );
    });
});

function goAjax(method, url, data){
    $.ajax({
        type: method,
        url: url,
        data: data,
        success: function(data) {
            $('.ajax-form .error-box').text('');
            var obj = JSON.parse(data);
            switch(obj.code){
                case 200:
                    alert('Успешно');
                    break;
                case 301:
                    $(location).attr('href',obj.url);
                    break;
                case 500:
                    if(obj.content.length > 1){
                        obj.content.forEach(function(item){
                            $('.ajax-form [name$="'+item.context+'\]"]').closest('div').find('.error-box').text(item.msg);
                        });
                    }
                    else{
                        $('.ajax-form [name$="'+obj.content.context+'\]"]').closest('div').find('.error-box').text(obj.content.msg);
                    }
                    break;
            }
        }
    });
}