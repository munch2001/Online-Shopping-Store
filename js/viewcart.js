
//since the context of the code is JavaScript PHP can't used. Therefore to format totalPrice variable in JavaScript with two decimal places,the 'toFixed' method is used.
document.addEventListener("DOMContentLoaded", function() {
    var totalPrice = parseFloat(document.getElementById("total-price").value).toFixed(2);
    var submitButton = document.getElementById("checkout-button");

    if (totalPrice > 0) {
        submitButton.disabled = false; // Enable the submit button
        console.log("if");
    } else {
        submitButton.disabled = true; // Disable the submit button
        console.log("else");
    }

    submitButton.addEventListener("click", function(evt) {
        var creditCard = document.getElementById("credit-card");
        var paypal = document.getElementById("paypal");

        if (!creditCard.checked && !paypal.checked) {
            alert("Please select either paypal or credit card!!!");
            evt.preventDefault();
        }
    });
});

