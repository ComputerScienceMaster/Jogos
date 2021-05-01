 
function left(){
    $.ajax({url: "http://localhost/2048/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function startGame(){
    $.ajax({url: "http://localhost/2048/Game.php", success: function(result){
        $("#game-table").html(result);
        $("#buttonStart").html("<div class='col-md-12' style='text-align: center; margin-bottom:20px'> <button onclick='reset()' class='btn btn-danger'>Reset game </button></div>");

    }});
}


function right(){
    $.ajax({url: "http://localhost/2048/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function up(){
    $.ajax({url: "http://localhost/2048/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function down(){
    $.ajax({url: "http://localhost/2048/Game.php", success: function(result){
        $("#game-table").html(result);
    }});
}

function reset(){
    $.ajax({url: "http://localhost/2048/GameReset.php", success: function(result){
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
