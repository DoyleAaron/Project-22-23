/*
Name of file: reorder.js
Purpose of screen: Dynamically populate the drug select element with the drugs for the selected supplier.
Student ID: C00274246
Student Name: Jack Foley
Date written: March 2023
*
* */

/*
*
* I am using JQuery to get the drugs for the selected supplier without reloading the page.
* Source: https://www.w3schools.com/jquery/jquery_ajax_get_post.asp
*
*/

let updateDrugs = () => {
    // Check if the document is loaded to prevent AJAX running before the page is loaded.
    $(document).ready(() => {
        // Get the supplier select element value
        const value = $("#select").val();

        // Get the supplier ID from the split value array
        const supplierID = value.split('|')[0];

        // Populate the hidden supplier ID input element
        $('#supplierID').val(supplierID);

        // Get request getdrugs.php to get the drugs for the selected supplier
        $.get('includes/getdrugs.php', {supplier_id: supplierID}, (data) => {
            // Use the data returned from the get request to populate the drug select element
            console.log(data)
            $('#drug-select').html(data);
        }).then(() => pop());
        // .then() is used to run the pop() function after the AJAX request has completed
    });
}

// Populate function
let pop = () => {
    const drugSelect = document.getElementById('drug-select');
    const id = document.getElementById('id');
    const name = document.getElementById('brandName');
    const genericName = document.getElementById('genName');
    const form = document.getElementById('form');
    const strength = document.getElementById('strength');
    const usage = document.getElementById('usage');
    const sideEffects = document.getElementById('sideEffects');
    const drugInfo = drugSelect.value;
    const drugInfoArray = drugInfo.split('|');

    if (drugInfoArray[0] === '') {
        id.value = 'N/A';
        name.value = 'N/A';
        genericName.value = 'N/A';
        form.value = 'N/A';
        strength.value = 'N/A';
        usage.value = 'N/A';
        sideEffects.value = 'N/A';
        document.getElementById('amount').disabled = true;
        document.getElementById('reorder').disabled = true;
    } else {
        id.value = drugInfoArray[0];
        name.value = drugInfoArray[1];
        genericName.value = drugInfoArray[2];
        form.value = drugInfoArray[3];
        strength.value = drugInfoArray[4];
        usage.value = drugInfoArray[5];
        sideEffects.value = drugInfoArray[6];
        document.getElementById('amount').disabled = false;
        document.getElementById('reorder').disabled = false;
    }

    const drugID = document.getElementById('drugID');
    drugID.value = id.value;
}

// On change of the supplier select element, run the updateDrugs function
$('#select').on('change', () => {
    updateDrugs();
});

// On page load, run the updateDrugs function
updateDrugs();