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

                <div class="form-step" id="time-slot-step" style="display: none;">
                    <label>2. Select a Time</label>
                    <div id="time-slots-container" class="time-slots-grid">
                        <!-- Available time slots will be injected here by JavaScript -->
                    </div>
                    <input type="hidden" name="appointment_time" id="appointment_time" required>
                </div>

                <div class="form-step">
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
                    <div id="form-errors" class="form-errors" style="display: none;"></div>
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
        const timeSlotStep = document.getElementById('time-slot-step');
        const timeSlotsContainer = document.getElementById('time-slots-container');
        const hiddenTimeInput = document.getElementById('appointment_time');
        
        const bookingForm = document.getElementById('booking-form');
        const bookingFormContainer = document.getElementById('booking-form-container');
        const confirmationMessage = document.getElementById('confirmation-message');
        const formErrors = document.getElementById('form-errors');

        // Set min date to today
        const today = new Date();
        today.setDate(today.getDate() + 1); // Start from tomorrow
        datePicker.setAttribute('min', today.toISOString().split('T')[0]);

        // --- Fetch and Display Time Slots ---
        datePicker.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const day = selectedDate.getUTCDay(); // Sunday = 0, Saturday = 6

            // Clear previous slots and hide the step
            timeSlotsContainer.innerHTML = '';
            hiddenTimeInput.value = '';
            timeSlotStep.style.display = 'none';

            if (day === 0) { // If Sunday
                alert('Sorry, we are closed on Sundays. Please select another date.');
                this.value = '';
                return;
            }

            if (this.value) {
                fetch(`get_available_slots.php?date=${this.value}`)
                    .then(response => response.json())
                    .then(slots => {
                        if (slots.length > 0) {
                            slots.forEach(slot => {
                                const slotButton = document.createElement('button');
                                slotButton.type = 'button';
                                slotButton.className = 'time-slot';
                                slotButton.textContent = slot;
                                slotButton.dataset.time = slot;
                                timeSlotsContainer.appendChild(slotButton);
                            });
                            timeSlotStep.style.display = 'block'; // Show the time slot step
                        } else {
                            timeSlotsContainer.innerHTML = '<p>No available slots for this date. Please try another day.</p>';
                            timeSlotStep.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching slots:', error);
                        timeSlotsContainer.innerHTML = '<p>Could not load time slots. Please try again.</p>';
                        timeSlotStep.style.display = 'block';
                    });
            }
        });

        // --- Handle Time Slot Selection ---
        timeSlotsContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('time-slot')) {
                // Remove 'selected' class from all slots
                document.querySelectorAll('.time-slot').forEach(btn => btn.classList.remove('selected'));
                
                // Add 'selected' class to the clicked slot
                event.target.classList.add('selected');
                
                // Update the hidden input value
                hiddenTimeInput.value = event.target.dataset.time;
            }
        });

        // --- Validate Form and Handle Submission ---
        bookingForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Stop default submission

            // --- Custom Validation ---
            const errors = [];
            formErrors.innerHTML = '';
            formErrors.style.display = 'none';

            const name = this.elements['client_name'].value.trim();
            const email = this.elements['client_email'].value.trim();
            const phone = this.elements['client_phone'].value.trim();
            const date = this.elements['appointment_date'].value;
            const time = this.elements['appointment_time'].value;

            if (name.length < 2) {
                errors.push('Full Name must be at least 2 characters long.');
            }
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                errors.push('Please enter a valid email address.');
            }
            if (phone && !/^[0-9\s\-\+\(\)]{7,15}$/.test(phone)) {
                errors.push('Please enter a valid phone number.');
            }
            if (!date) {
                errors.push('Please select a date.');
            }
            if (!time) {
                errors.push('Please select an available time slot.');
            }

            if (errors.length > 0) {
                formErrors.innerHTML = errors.join('<br>');
                formErrors.style.display = 'block';
                return; // Stop submission
            }
            // --- End Custom Validation ---

            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Booking...';

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