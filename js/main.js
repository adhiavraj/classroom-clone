let isUserRegistered = false;

// Get the buttons
const registerBtn = document.getElementById('reg');
const createClassBtn = document.getElementById('inputEmail');
const joinClassBtn = document.getElementById('inputPassword');

// Event listener for the register button
registerBtn.addEventListener('click', () => {
  isUserRegistered = true;
  updateButtonStatus();
});

// Function to update the button status based on user registration status
function updateButtonStatus() {
  if (isUserRegistered) {
    createClassBtn.removeAttribute('disabled');
    joinClassBtn.removeAttribute('disabled');
  }
  
} 

// Generating Auto Code to Access the Class / Material 

function generateRandomCode(length) {
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let code = '';
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * characters.length);
    code += characters.charAt(randomIndex);
  }
  return code;
}

const generatedCode = generateRandomCode(6);


// To Display that code in the Create class Page

const codeContainer = document.getElementById('code-container');
codeContainer.textContent = `Generated Code: ${generatedCode}`;


/* Navigation DropDown Managment */

  document.addEventListener("DOMContentLoaded", function() {
    const dropdownButton = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownButton.addEventListener("click", function() {
      dropdownMenu.classList.toggle("show");
    });

    window.addEventListener("click", function(event) {
      if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove("show");
      }
    });
  });

