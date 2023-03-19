/*
Name of file: date.js
Purpose of screen: This file is used to get the current server time and date and display it on the page.
Student ID: C00274246
Student Name: Jack Foley
Date written: February 2023
*/

const date = new Date();
document.getElementById("time").innerHTML = date.toLocaleDateString();