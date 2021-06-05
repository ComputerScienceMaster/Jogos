 
function left(){
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/moveLeft.php", success: function(result){
        $("#game-table").html(result);
    }});
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/getMessages.php", success: function(msg){
        $("#messages").html(msg);
    }});
}



function right(){
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/moveUp.php", success: function(result){
        $("#game-table").html(result);

    }});
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/getMessages.php", success: function(msg){
        $("#messages").html(msg);
    }});
}

function up(){
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/moveRight.php", success: function(result){
        $("#game-table").html(result);
    }});
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/getMessages.php", success: function(msg){
        $("#messages").html(msg);
    }});
}

function down(){
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/moveDown.php", success: function(result){
        $("#game-table").html(result);
    }});
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/Movimentos/getMessages.php", success: function(msg){
        $("#messages").html(msg);
    }});
}

function reset(){
    $.ajax({url: "http://jogos.computersciencemaster.com.br/2k48/GameControls/GameReset.php", success: function(result){
       $("#game-table").html(result);

    }});
    
}

document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
        left();
        break;
        case 38:
        right();
        break;
        case 39:
        up();
        break;
        case 40:
        down();
        break;

    }
}
