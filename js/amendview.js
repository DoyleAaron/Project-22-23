const select = document.getElementById('select');
const amendButton = document.getElementById('amend');
const saveButton = document.getElementById('save');
const hiddenButton = document.getElementById('hidden');

init();

function init() {
    change();
    hiddenButton.style.display = 'none';
    saveButton.style.display = 'none';
}

function change() {
    const info = select.value.split("|");
    const id = info[0];
    const name = info[1];
    const address = info[2];
    const email = info[3];
    const website = info[4];
    const telephone = info[5];

    document.getElementById('id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('address').value = address;
    document.getElementById('email').value = email;
    document.getElementById('website').value = website;
    document.getElementById('telephone').value = telephone;
}

function toggle() {
    if (amendButton.innerHTML === 'Amend') {
        saveButton.style.display = 'block';
        amendButton.innerHTML = 'View';

        document.getElementById('name').disabled = false;
        document.getElementById('address').disabled = false;
        document.getElementById('email').disabled = false;
        document.getElementById('website').disabled = false;
        document.getElementById('telephone').disabled = false;
    } else {
        saveButton.style.display = 'none';
        amendButton.innerHTML = 'Amend';

        document.getElementById('name').disabled = true;
        document.getElementById('address').disabled = true;
        document.getElementById('email').disabled = true;
        document.getElementById('website').disabled = true;
        document.getElementById('telephone').disabled = true;
    }
}

function confirmSave() {
    if (confirm('Are you sure you want to save these changes?')) {
        document.getElementById('id').disabled = false;
        document.getElementById('select').disabled = true;
        hiddenButton.click();
        document.getElementById('id').disabled = true;
        document.getElementById('select').disabled = false;
        return;
    }

    change();
    toggle();
}