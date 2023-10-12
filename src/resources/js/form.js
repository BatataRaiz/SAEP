function isFormNotEmpty(form) {
    const inputs = form.querySelectorAll('input');
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim() === '') {
            return false;
        }
    }
    return true;
}
