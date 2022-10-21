/** global: baseUrl */
$(document).ready(function() {
    var deckId = Pack.deckId;
    var cardId = Pack.cardId;

    $('.btn-add').on('click', function(){
        var boardId = $(this).attr('data-board-id');
        var boardType = $(this).attr('data-board-type');
        var nowCount = $("#" +boardType + "-count").val();
        $.ajax({
            url:Pack.baseUrl+'deck-cards/add',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: cardId,
                board: boardId
            }
        }).success(function(){
            $("#" +boardType + "-count").val(parseInt(nowCount) + parseInt(1));
        });
    });

    $('.btn-delete').on('click', function(){
        var boardId = $(this).attr('data-board-id');
        var boardType = $(this).attr('data-board-type');
        var nowCount = $("#" +boardType + "-count").val();
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
                board: boardId,
                count: nowCount
            }
        }).success(function(){
            $("#" +boardType + "-count").val(parseInt(nowCount) - parseInt(1));
        });
    });

    $('.btn-general').on('click', function(){
        var boardId = $(this).attr('data-board-id');
        var boardType = $(this).attr('data-board-type');
        var nowCount = $("#" +boardType + "-count").val();
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
                board: boardId,
                count: nowCount
            }
        }).success(function(){
            $("#" +boardType + "-count").val(parseInt(nowCount) - parseInt(1));
        });
    });
});