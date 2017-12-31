/** global: baseUrl */
$(document).ready(function() {
    var deckId = Pack.deckId;
    var cardId = Pack.cardId;
    $('.main-add').on('click', function(){
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
            var nowCount = $('#main-count').val();
            $('#main-count').val(parseInt(nowCount) + parseInt(1));
        });
    });
});