var y = document.querySelector("#y");


$(document).ready(function(){

    $.ajax({
        url: 'table_restore.php',
        method: "GET",
        dataType: "html",
        success: function(data){
            console.log(data);
            $("#table>tbody").html(data);
        },
        error: function(error){
            console.log(error);
        },
    })
})

$("#form").on("submit", function(event){
    event.preventDefault();

    $.ajax({
        url: 'onclick.php',
        method: "GET",
        data: $(this).serialize() + "&timezone=" + new Date().getTimezoneOffset(),
        dataType: "html",

        success: function(data){
            console.log(data);
            $("#send").attr("disabled", false);
            $("#table>tbody").html(data);
        },
        error: function(error){
            console.log(error);
            $("#send").attr("disabled", false);
        },
    })
});

$("#reset").on("click",function(){
    $.ajax({
        url: 'table_reset.php',
        type: "GET",
        dataType: "html",
        success: function(data){
            console.log(data);
            $("#table>tbody").html(data);
        },
        error: function(error){
            console.log(error);
        },
    })
})