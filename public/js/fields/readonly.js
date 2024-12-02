document.addEventListener('DOMContentLoaded', function () {
    const select2Elements = document.querySelectorAll('[aria-controls^="select2-"][aria-controls$="-container"]');

    select2Elements.forEach(element => {
        if (!element.closest('#form-approve')) {
            element.classList.add('form-select-solid');
        }
    });

    const inputElements = document.querySelectorAll('input, textarea, select, .yearpicker-inventaris');
    inputElements.forEach(element => {
        if (!element.closest('#form-approve')) {
            element.disabled = true;
            element.classList.add('form-control-solid');
        }
    });
});