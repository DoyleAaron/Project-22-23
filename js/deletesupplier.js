const select = document.getElementById('select');
const hiddenButton = document.getElementById('hidden');
init();

function init() {
    change();
    hiddenButton.style.display = 'none';
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

function confirmDelete() {
    if (confirm('Are you sure you want to delete this supplier?')) {
        document.getElementById('id').disabled = false;
        document.querySelector('select').disabled = true;
        hiddenButton.click();
        document.getElementById('id').disabled = true;
        document.querySelector('select').disabled = false;
        return;
    }

    change();
    toggle();
}