let y = document.getElementsByName("y");
const isNumber = (data: number): boolean => !Number.isNaN(data);
function validateY() {
    if (!isNumber(y)) {
        errorMessage("Y is not a number.")
        return false
    }
    if (!inRange(y)) {
        errorMessage("Y has to be in range of -3..5.")
        return false
    }
    return true
}
function errorMessage(message) {
        print(message)
}
function inRange(num) {
    if(5 > num > -5)
        return true
}
