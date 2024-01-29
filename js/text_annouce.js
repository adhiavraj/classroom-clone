document.addEventListener("DOMContentLoaded", function () {
    const tag = document.querySelector(".tag");
    const textArea = document.querySelector(".text-area");
    const cancelButton = document.querySelector(".cancel-button");

});

    document.addEventListener('DOMContentLoaded', function () {
        const copyButtons = document.querySelectorAll('.copy-button');
        copyButtons.forEach(button => {
            button.addEventListener('click', function () {
                const codeBlock = button.previousElementSibling;
                const codeText = codeBlock.textContent;

                const tempInput = document.createElement('textarea');
                tempInput.value = codeText;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);

                // Change the icon temporarily to a checkmark
                const icon = button.querySelector('i');
                icon.classList.remove('fa-copy');
                icon.classList.add('fa-check');

                // Reset the icon after a short delay
                setTimeout(() => {
                    icon.classList.remove('fa-check');
                    icon.classList.add('fa-copy');
                }, 1000);

                // Optionally, you can show a tooltip or other feedback
                button.setAttribute('data-tooltip', 'Code copied!');
            });
        });
    });



    document.addEventListener('DOMContentLoaded', function () {
        const copyButtons = document.querySelectorAll('.copy-button');
        copyButtons.forEach(button => {
            button.addEventListener('click', function () {
                const codeBlock = button.previousElementSibling;
                const codeText = codeBlock.textContent;

                const tempInput = document.createElement('textarea');
                tempInput.value = codeText;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);

                // Show a tooltip or other feedback
                button.setAttribute('data-tooltip', 'Code copied!');
            });
        });
    });

