<!DOCTYPE html>
<html>
<head>
    <style>
        /* Styling for the modal and overlay */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* Close button style */
        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer; /* Add this line to make the "×" clickable */
        }
    </style>
</head>
<body>

<!-- Button to open the modal -->
<button id="openModal">Open Modal</button>

<!-- The Modal -->
<div id="editRoom" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>My Modal</h2>
        <p>This is a custom modal created with plain HTML, CSS, and JavaScript.</p>
    </div>
</div>

<script>
    // Get references to the modal and the button to open/close it
    var modal = document.getElementById('editRoom');
    var openModalButton = document.getElementById('openModal');
    var closeModalButton = document.getElementById('closeModal');

    // Function to open the modal
    function openModal() {
        modal.style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        modal.style.display = 'none';
    }

    // Event listeners to open and close the modal
    openModalButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', closeModal);

    // Close the modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            closeModal();
        }
    });
</script>

</body>
</html>
