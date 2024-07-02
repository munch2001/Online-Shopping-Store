// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    var paymentForm = document.getElementById('payment-form');

    // Get the card number input element
    var cardNumberInput = document.getElementById('card-number');

    // Add event listener to the card number input's blur event
    cardNumberInput.addEventListener('blur', function() {
        // Check if the card number is valid
        if (!isValidCardNumber(cardNumberInput.value.trim())) {
            // If card number is invalid, show an alert
            alert('Invalid card number');
        }
    });

    // Add event listener to the form's submit event
    paymentForm.addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Check if the card number is valid
        if (isValidCardNumber(cardNumberInput.value.trim())) {
            // If card number is valid, display success message
            showSuccessMessage();
        }
    });

    // Function to validate card number
    function isValidCardNumber(cardNumber) {
        // Check if card number has exactly 16 digits
        return /^\d{16}$/.test(cardNumber);
    }

    // Function to display success message
    function showSuccessMessage() {
        // Create a success message element
        var successMessage = document.createElement('div');
        successMessage.textContent = 'Your payment is successful!';
        successMessage.classList.add('success-message');

        // Append the success message to the body
        document.body.appendChild(successMessage);

        // Clear form inputs
        paymentForm.reset();

        // Remove the success message after a delay
        setTimeout(function() {
            successMessage.remove();
        }, 3000);
    }
});
