function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

function javaAlert(response){
    var type=  response.alert_type;
    switch(type){
        case 'info':
        toastr.info(response.message);
        break;
    case 'success':
        toastr.success(response.message);
        break;
    case 'warning':
        toastr.warning(response.message);
        break;
    case 'error':
    toastr.error(response.message);
    break;
    }
}
