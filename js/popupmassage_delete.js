// JavaScript code
const deleteButton = document.getElementByClass('delete');

delete.addEventListener('click', function() {
  // Display the popup message
  const popupMessage = document.createElement('div');
  popupMessage.textContent = 'Item has been deleted';
  popupMessage.className = 'popup-message';
  document.body.appendChild(popupMessage);

  // Automatically remove the popup message after 3 seconds
  setTimeout(function() {
    popupMessage.remove();
  }, 3000);
});