
function inRange(num) {
    if(6 > num && -4 < num) {
        return true
    }
    else return false
}

function isNumber(n){

    return !isNaN(n) && isFinite(n);
}


function removeValidation() {
    var errors = document.querySelectorAll('.error')
    for (var i = 0; i < errors.length; i++) {
        errors[i].remove()
    }
}

function errorMessage(message) {
    var error = document.createElement('div');
    error.className = 'error';
    error.style.color = "red";
    error.innerHTML = message;
    return error;
}

function validateY(y) {
    var yy = parseFloat(y.value.replace(',', '.'));
    if (!isNumber(yy)) {
        y.parentElement.insertBefore(errorMessage("Y is not a number."), y)
        return false

    }
    if (!inRange(yy)) {
        y.parentElement.insertBefore(errorMessage(("Y has to be in range of -3..5.")), y)
        return false
    }
    else return true
}




