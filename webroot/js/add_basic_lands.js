/** global: baseUrl */
$(document).ready(function() {
    var deckId = Pack.deckId;

    $('.add-basic-land').on('click', function(){
        /* 押したボタンの土地idと名称を取得 */
        var landId = $(this).attr('data-land-id');
        var landName = $(this).attr('data-land-name');
        var nowCount = $("#" +landName + "-count").val();
        var board = 1;
        $.ajax({
            url:Pack.baseUrl+'deck-cards/add',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: landId,
                board: board
            }
        }).success(function(){
            $("#" +landName + "-count").val(parseInt(nowCount) + parseInt(1));
        });
    });

    $('.delete-basic-land').on('click', function(){
        /* 押したボタンの土地idと名称を取得 */
        var landId = $(this).attr('data-land-id');
        var landName = $(this).attr('data-land-name');
        var board = 1;
        var nowCount = $("#" +landName + "-count").val();
        if (nowCount == 0) {
            return;
        }

        $.ajax({
            url:Pack.baseUrl+'deck-cards/delete',
            type:'post',
            dataType:'json',
            data:{
                deckId: deckId,
                cardId: landId,
                board: board,
                count: nowCount
            }
        }).success(function(){
            $("#" +landName + "-count").val(parseInt(nowCount) - parseInt(1));
        });
    });
});