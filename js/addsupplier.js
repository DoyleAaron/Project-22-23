function logout() {
    let result = confirm("Are you sure you want to logout?");

    if (result) {
        window.location.href = "index.html";
        return;
    }

    return false;
}

function handleSubmit() {
    if (confirm("Are you sure you want to add this supplier?")) {
        document.forms["form"].submit();
    }
}