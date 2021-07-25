
function ExecuteAjax(option,donefunc,failfunc){
    $.ajax(
        option
    )
    .done(
        donefunc
    )
    .fail(
        failfunc
    );
}