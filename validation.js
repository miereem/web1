const y = document.getElementById("y")

const isNumber = (data: number): boolean => !Number.isNaN(data);

function inRange(num) {
    if(5 > num > -3)
        return true
}

function errorMessage(message) {
    var error = document.createElement('div');
    error.className = 'error';
    error.style.color = "red";
    error.innerHTML = message;
    return error;
}

function validateY(y) {
    if (!isNumber(y)) {
        y.parentElement.insertBefore(errorMessage("Y is not a number."), y)
        return false
    }
    if (!inRange(y)) {
        y.parentElement.insertBefore(errorMessage(("Y has to be in range of -3..5.")), y)
        return false
    }
    return true
}




