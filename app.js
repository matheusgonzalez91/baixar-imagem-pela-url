$(document).ready(function(){
    $('#field').on('focusout', function(){
        let imagURL = $('#field').val();
        if(imagURL != ''){
            let regPattern = /\.(jpe?g|png|gif|bmp)$/i;
            if(regPattern.test(imagURL)){
                let imgTag = '<img src="'+ imagURL +'" alt="">';
                $('.img-preview').append(imgTag);
                $('.preview-box').addClass('imgActive');
                $('#button').addClass('active');
                $('#field').addClass('disabled');
                $('.cancel-icon').on('click', function(){
                    $('.preview-box').removeClass('imgActive');
                    $('#button').removeClass('active');
                    $('#field').removeClass('disabled')
                    $('.img-preview img').remove();
                });
            }else{
                alert('URL inválida - ' + imagURL);
                $('#field').val('');
            }
        }
    })
});


