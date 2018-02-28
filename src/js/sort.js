/**
 * Created by User on 25.11.2017.
 */

//var pjaxContainer='#pjax-content';

function setPjaxContainer(selector) {
    pjaxContainer=selector;
}
function start_sort() {
    $(".move-button").on("click",function() {
        var url=$(this).attr('value');
        $.ajax({
            url: url,
            type: 'POST',
            dateType: 'json',
            success: function(res){
                console.log(res);
                $.pjax.reload({
                    container:pjaxContainer
                });
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
}

$(function () {
    start_sort();
    $(document).on('pjax:complete', function() {
        start_sort();
    });
});