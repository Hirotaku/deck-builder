/** global: baseUrl */
$(document).ready(function() {
    var deckId = Pack.deckId;
    var cardId = Pack.cardId;
    var userId = Pack.userId;

    $('.btn-wants-add').on('click', function(){
        var nowCount = $("#wants-count").val();
        $.ajax({
            url:Pack.baseUrl+'wants/add',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: cardId,
                userId: userId
            }
        }).success(function(){
            $("#wants-count").val(parseInt(nowCount) + parseInt(1));
        });
    });

    $('.btn-wants-delete').on('click', function(){
        var nowCount = $("#wants-count").val();
        if (nowCount == 0) {
            return;
        }

        $.ajax({
            url:Pack.baseUrl+'wants/delete',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: cardId,
                userId: userId,
                count: nowCount
            }
        }).success(function(){
            $("#wants-count").val(parseInt(nowCount) - parseInt(1));
        });
    });
});