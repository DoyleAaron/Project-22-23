function submitForm() {
    if (confirm("Are you sure you want to delete this supplier?")) {
        let form = document.forms["form"];
        form.submit();
    }
}