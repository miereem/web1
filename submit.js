var y = document.querySelector("#yvalue");


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


    console.log("validating y" );
    console.log('y: ', y.value);
    removeValidation();

    if(!validateY(y)){
        console.log("request canceled")
        return
    }

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
    removeValidation();
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