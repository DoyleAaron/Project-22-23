/*
Name of file: addsupplier.js
Purpose of screen: This file is used to validate the form before submitting it to the server.
Student ID: C00274246
Student Name: Jack Foley
Date written: March 2023
*/

function handleSubmit() {
    if (confirm("Are you sure you want to add this supplier?")) {
        document.forms["form"].submit();
    }
}