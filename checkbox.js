function checkedOnClick(el, classname){
    let checkboxesList = document.getElementsByClassName(classname);
    for (let i = 0; i < checkboxesList.length; i++) {
        checkboxesList.item(i).checked = false; // Uncheck all checkboxes
    }

    el.checked = true; // Checked clicked checkbox
}