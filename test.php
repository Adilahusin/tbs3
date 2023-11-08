<!DOCTYPE html>
<html>
<head>
    <title>PHP Form with Modal</title>
    <style>
        /* Style for the modal container */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* Style for the modal content */
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        /* Style for the form fields */
        .form-field {
            margin-bottom: 10px;
            clear: both;
        }

        /* Style for the left and right form fields */
        .left-field {
            width: 48%;
            float: left;
        }

        .right-field {
            width: 48%;
            float: right;
        }

        /* Style for Field 3 to make it longer and align with fields on top */
        .long-field {
            width: 100%;
            clear: both;
        }

        /* Style for the button to open the modal */
        #openModalBtn {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button id="openModalBtn">Open Modal</button>

    <!-- The modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="process_form.php" method="post">
                <div class="form-field">
                    <div class="left-field">
                        <label for="field1">Field 1:</label>
                        <input type="text" id="field1" name="field1" required>
                    </div>
                    <div class="right-field">
                        <label for="field2">Field 2:</label>
                        <input type="text" id="field2" name="field2" required>
                    </div>
                </div>
                <div class="form-field">
                    <label for="field3">Field 3:</label>
                    <input type="text" id="field3" name="field3" style="width: 77.3%;" required>
                </div>
                <div class="form-field">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to open the modal
        document.getElementById("openModalBtn").addEventListener("click", function() {
            document.getElementById("myModal").style.display = "block";
        });
    </script>
</body>
</html>
