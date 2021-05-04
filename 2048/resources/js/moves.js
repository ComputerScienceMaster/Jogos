 
function left(){
    $.ajax({url: "http://localhost/2048/GameControls/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}



function right(){
    $.ajax({url: "http://localhost/2048/GameControls/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function up(){
    $.ajax({url: "http://localhost/2048/GameControls/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function down(){
    $.ajax({url: "http://localhost/2048/GameControls/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function reset(){
    $.ajax({url: "http://localhost/2048/GameControls/GameReset.php", success: function(result){
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
