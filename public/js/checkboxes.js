function toggle(source) {
    let checkboxes = document.getElementsByName("checkbox-send");
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}
