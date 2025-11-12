<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment - BizBud</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body class="app-page">

    <div class="appointment-container">
        <div class="appointment-header">
            <a href="index.php" style="text-decoration: none; color: inherit;"><h1>BizBud</h1></a>
            <p>Book a Consultation</p>
        </div>

        <div id="booking-form-container">
            <form id="booking-form" action="submit_appointment.php" method="POST">
                <div class="form-step">
                    <label for="date-picker">1. Select a Date</label>
                    <div class="form-group">
                        <input type="date" id="date-picker" name="appointment_date" required>
                    </div>
                </div>

                <div class="form-step">
                    <label>2. Your Details</label>
                    <div class="form-group">
                        <input type="text" name="client_name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="client_email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="client_phone" placeholder="Phone Number (Optional)">
                    </div>
                </div>
                
                <button type="submit" class="btn-submit">Confirm Appointment</button>
            </form>
        </div>

        <div id="confirmation-message" style="display: none;">
            <h2>Thank You!</h2>
            <p>Your appointment has been successfully booked.</p>
            <p>You will receive a confirmation email shortly.</p>
            <a href="index.php" class="btn-primary" style="margin-top: 20px;">Back to Home</a>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const datePicker = document.getElementById('date-picker');
        const bookingForm = document.getElementById('booking-form');
        const bookingFormContainer = document.getElementById('booking-form-container');
        const confirmationMessage = document.getElementById('confirmation-message');

        // Set min date to today
        const today = new Date().toISOString().split('T')[0];
        datePicker.setAttribute('min', today);

        // --- Validate Date Selection ---
        datePicker.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const day = selectedDate.getUTCDay(); // Sunday = 0

            if (day === 0) { // If Sunday
                alert('Sorry, we are closed on Sundays. Please select another date.');
                this.value = ''; // Reset the date picker
            }
        });

        // --- Handle Form Submission ---
        bookingForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Stop the default form submission

            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Booking...';

            const formData = new FormData(this);

            // Final validation before submitting
            if (!formData.get('appointment_date')) {
                alert('Please select a date for your appointment.');
                submitButton.disabled = false;
                submitButton.textContent = 'Confirm Appointment';
                return;
            }

            fetch('submit_appointment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // On success, hide the form and show the confirmation message
                    bookingFormContainer.style.display = 'none';
                    confirmationMessage.style.display = 'block';
                } else {
                    // On failure, show an alert and re-enable the button
                    alert(data.message || 'An unknown error occurred. Please try again.');
                    submitButton.disabled = false;
                    submitButton.textContent = 'Confirm Appointment';
                }
            })
            .catch(error => {
                console.error('Submission Error:', error);
                alert('A network error occurred. Could not submit your appointment.');
                submitButton.disabled = false;
                submitButton.textContent = 'Confirm Appointment';
            });
        });
    });
    </script>

</body>
</html>