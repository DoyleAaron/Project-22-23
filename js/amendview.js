let address = document.getElementById("address");
let email = document.getElementById("email");
let website = document.getElementById("website");
let telephone = document.getElementById("telephone");

let toggleEditButton = document.getElementById("buttonAmend");
let submitEditButton = document.getElementById("submitAmend");

init();

function init() {
    if (localStorage.getItem('editing') === "1") {
        address.disabled = false;
        email.disabled = false;
        website.disabled = false;
        telephone.disabled = false;
        submitEditButton.style.display = "block";
        toggleEditButton.innerHTML = "Disable Editing";
        return;
    }

    address.disabled = true;
    email.disabled = true;
    website.disabled = true;
    telephone.disabled = true;
    submitEditButton.style.display = "none";
    toggleEditButton.innerHTML = "Enable Editing";

}

function toggleEdit() {
    // Enable editing
    if (address.disabled) {
        address.disabled = false;
        email.disabled = false;
        website.disabled = false;
        telephone.disabled = false;
        toggleEditButton.innerHTML = "Disable Editing";
        submitEditButton.style.display = "block";
        localStorage.setItem('editing', "1")
    } else { // Disable editing
        address.disabled = true;
        email.disabled = true;
        website.disabled = true;
        telephone.disabled = true;
        toggleEditButton.innerHTML = "Enable Editing";
        submitEditButton.style.display = "none";
        localStorage.setItem('editing', "0")
    }
}

/*
This function is used to have a separate pop-up confirmation for the submit button.
This is because the submit button is not a part of the form, but is instead a button
that is used to submit the form.

The function creates a hidden input element, appends it to the form, submits the form,
then removes the hidden input element.

This has to be done because the PHP code checks if the post request contains the value 'submit-amend'
to determine if the form was submitted by the submit button or the save button. The button itself is not posted,
so this was the solution I came up with.

Although I'm sure there's probably a better way to do this, this works for now.
 */
function confirmSubmit() {

    if (window.confirm("Are you sure you want to submit these changes?")) {
        let form = document.forms["form"];
        let hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "submit-amend");

        form.append(hiddenInput);
        form.submit();
        form.removeChild(hiddenInput);
    }

}