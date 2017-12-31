/** global: baseUrl */
$(document).ready(function() {
    var deckId = Pack.deckId;
    var cardId = Pack.cardId;

    $('.main-add').on('click', function(){
        var nowCount = $('#main-count').val();
        var board = 1;
        $.ajax({
            url:Pack.baseUrl+'deck-cards/add',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: cardId,
                board: board
            }
        }).success(function(){
            $('#main-count').val(parseInt(nowCount) + parseInt(1));
        });
    });

    $('.main-delete').on('click', function(){
        var board = 1;
        var nowCount = $('#main-count').val();
        if (nowCount == 0) {
            return;
        }

        $.ajax({
            url:Pack.baseUrl+'deck-cards/delete',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: cardId,
                board: board,
                count: nowCount
            }
        }).success(function(){
            $('#main-count').val(parseInt(nowCount) - parseInt(1));
        });
    });
});