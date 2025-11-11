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
                <!-- Step 1: Date Selection -->
                <div class="form-step">
                    <label for="date-picker">1. Select a Date</label>
                    <div class="form-group">
                        <input type="date" id="date-picker" name="appointment_date" required>
                    </div>
                </div>

                <!-- Step 2: Time Selection -->
                <div class="form-step" id="time-selection-step" style="display: none;">
                    <label>2. Select an Available Time</label>
                    <div id="time-slots-grid" class="time-slots-grid">
                        <!-- Available time slots will be loaded here via JavaScript -->
                    </div>
                    <input type="hidden" id="selected-time" name="appointment_time" required>
                </div>

                <!-- Step 3: Your Details -->
                <div class="form-step" id="details-step" style="display: none;">
                    <label>3. Your Details</label>
                    <div class="form-group">
                        <input type="text" name="client_name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="client_email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="client_phone" placeholder="Phone Number (Optional)">
                    </div>
                    <button type="submit" class="btn-submit">Confirm Appointment</button>
                </div>
            </form>
        </div>

        <div id="confirmation-message">
            <h2>Thank You!</h2>
            <p>Your appointment has been successfully booked.</p>
            <p>You will receive a confirmation email shortly.</p>
            <a href="index.php" class="btn-primary" style="margin-top: 20px;">Back to Home</a>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const datePicker = document.getElementById('date-picker');
        const timeSelectionStep = document.getElementById('time-selection-step');
        const timeSlotsGrid = document.getElementById('time-slots-grid');
        const selectedTimeInput = document.getElementById('selected-time');
        const detailsStep = document.getElementById('details-step');
        const bookingForm = document.getElementById('booking-form');
        const bookingFormContainer = document.getElementById('booking-form-container');
        const confirmationMessage = document.getElementById('confirmation-message');

        // Set min date to today
        const today = new Date().toISOString().split('T')[0];
        datePicker.setAttribute('min', today);

        datePicker.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const day = selectedDate.getUTCDay(); // Sunday = 0, Monday = 1, ...

            timeSlotsGrid.innerHTML = '<p>Loading available times...</p>';
            timeSelectionStep.style.display = 'block';
            detailsStep.style.display = 'none';
            selectedTimeInput.value = '';

            if (day === 0) { // If Sunday
                timeSlotsGrid.innerHTML = '<p style="color: red;">Sorry, we are closed on Sundays. Please select another date.</p>';
                return;
            }

            // Fetch available slots from the server
            fetch(`get_available_slots.php?date=${this.value}`)
                .then(response => response.json())
                .then(slots => {
                    timeSlotsGrid.innerHTML = '';
                    if (slots.length > 0) {
                        slots.forEach(slot => {
                            const slotElement = document.createElement('div');
                            slotElement.classList.add('time-slot');
                            slotElement.textContent = slot;
                            slotElement.dataset.time = slot;
                            slotElement.addEventListener('click', function() {
                                // Remove 'selected' from any previously selected slot
                                const currentlySelected = timeSlotsGrid.querySelector('.selected');
                                if (currentlySelected) {
                                    currentlySelected.classList.remove('selected');
                                }
                                // Add 'selected' to the clicked slot
                                this.classList.add('selected');
                                selectedTimeInput.value = this.dataset.time;
                                detailsStep.style.display = 'block';
                            });
                            timeSlotsGrid.appendChild(slotElement);
                        });
                    } else {
                        timeSlotsGrid.innerHTML = '<p>No available slots for this day. Please try another date.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching time slots:', error);
                    timeSlotsGrid.innerHTML = '<p style="color: red;">Could not load time slots. Please try again.</p>';
                });
        });

        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);

            fetch('submit_appointment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    bookingFormContainer.style.display = 'none';
                    confirmationMessage.style.display = 'block';
                } else {
                    alert('Booking failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error submitting form:', error);
                alert('An error occurred. Please try again.');
            });
        });
    });
    </script>

</body>
</html>