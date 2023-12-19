document.addEventListener('DOMContentLoaded', function() {
    var editRoomModal = document.getElementById('editRoomModal');
    var openEditRoomButton = document.getElementById('editRoom');
    var closeEditRoomModalButton = document.getElementById('closeEditRoomModal');
    var deleteRoomButton = document.getElementById('deleteRoom');
    var statusRoomButton = document.getElementById('statusRoom');

    function openEditRoomModal() {
        editRoomModal.style.display = 'block';
    }

    function closeModal() {
        editRoomModal.style.display = 'none';
    }

    function confirmRoomDeletion() {
        var confirmation = confirm("Are you sure you want to delete this room?");

        if (confirmation) {
            var urlParams = new URLSearchParams(window.location.search);
            var roomId = urlParams.get('id');

            if (roomId) {
                window.location.href = "../class/delete.php?action=delete&id=" + roomId + "&entity=room";
            } else {
                alert("Room ID not found in the URL.");
            }
        }
    }

    function handleOutsideClick(event) {
        if (event.target === editRoomModal) {
            closeModal();
        }
    }

    openEditRoomButton.addEventListener('click', openEditRoomModal);
    closeEditRoomModalButton.addEventListener('click', closeModal);
    deleteRoomButton.addEventListener('click', confirmRoomDeletion);
    window.addEventListener('click', handleOutsideClick);

    var deleteButton = document.getElementById('deleteRoom');
    if (deleteButton) {
        deleteButton.addEventListener('click', confirmRoomDeletion);
    }
});

// function for change status room
$(document).ready(function() {
    $('#statusRoom').on('click', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var roomId = urlParams.get('id');
        console.log("Change status for room ID:", roomId);

        var updateStatus = '../class/update2.php'; 

        $.ajax({
            type: 'POST',
            url: updateStatus,
            data: { roomId: roomId },
            success: function(response) {
                // Handle success response
                alert('Status updated successfully');
                location.reload(); 
            },
            error: function(xhr, status, error) {
                // Handle error response
                alert('Error updating status: ' + error + '. Please try again later.');
                location.reload(); 
            }
        });
    });
});

