<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .nav-links {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-links a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 10px;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: white;
        }

        .nav-links a:hover {
            background-color: #e8f5e9;
        }

        .reminder-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px 0;
        }

        button:hover {
            background-color: #45a049;
        }

        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        input[type="datetime-local"] {
            padding: 8px;
            margin: 10px 0;
            width: 100%;
            max-width: 300px;
        }

        #countdown {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        .active {
            background-color: #e8f5e9;
            border: 2px solid #4CAF50;
        }
    </style>
</head>
<body>
    <div class="nav-links">
        <a href="reminder.html">Reminders</a>
        <a href="education.html">Education</a>
        <a href="widget.html">Accessibility</a>
    </div>

    <div class="reminder-box" id="quickReminder">
        <h2>Quick Reminder</h2>
        <input type="number" id="minutes" placeholder="Enter minutes" min="1" max="10080">
        <button onclick="setQuickReminder()">Set Quick Reminder</button>
        <div id="quickReminderStatus"></div>
        <div id="quickReminderCountdown"></div>
    </div>

    <div class="reminder-box" id="scheduledReminder">
        <h2>Schedule a Reminder</h2>
        <input type="datetime-local" id="scheduleInput">
        <button onclick="scheduleReminder()">Schedule</button>
        <div id="countdown"></div>
    </div>

    <script>
        let activeReminders = {
            quick: null,
            scheduled: null
        };

        function showMessage(elementId, message) {
            const element = document.getElementById(elementId);
            element.textContent = message;
            setTimeout(() => {
                element.textContent = '';
            }, 3000);
        }

        function updateBoxState(boxId, isActive) {
            const box = document.getElementById(boxId);
            if (isActive) {
                box.classList.add('active');
            } else {
                box.classList.remove('active');
            }
        }

        function formatTime(ms) {
            const days = Math.floor(ms / (1000 * 60 * 60 * 24));
            const hours = Math.floor((ms % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((ms % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((ms % (1000 * 60)) / 1000);

            let timeString = '';
            if (days > 0) timeString += `${days}d `;
            if (hours > 0) timeString += `${hours}h `;
            if (minutes > 0) timeString += `${minutes}m `;
            timeString += `${seconds}s`;
            return timeString;
        }

        function setQuickReminder() {
            const minutesInput = document.getElementById('minutes');
            const minutes = parseInt(minutesInput.value);
            const ms = minutes * 60000;

            if (!isNaN(ms) && ms > 0 && ms <= 604800000) { // Max 1 week
                // Clear any existing quick reminder
                if (activeReminders.quick) {
                    clearTimeout(activeReminders.quick);
                }

                updateBoxState('quickReminder', true);
                showMessage('quickReminderStatus', 'Reminder set!');
                const countdownEl = document.getElementById('quickReminderCountdown');
                const endTime = Date.now() + ms;

                const interval = setInterval(() => {
                    const remaining = endTime - Date.now();
                    if (remaining <= 0) {
                        clearInterval(interval);
                        countdownEl.textContent = '';
                        updateBoxState('quickReminder', false);
                        alert("Time's up!");
                    } else {
                        countdownEl.textContent = `Time remaining: ${formatTime(remaining)}`;
                    }
                }, 1000);

                activeReminders.quick = setTimeout(() => {
                    clearInterval(interval);
                    updateBoxState('quickReminder', false);
                }, ms);
            } else {
                showMessage('quickReminderStatus', 'Please enter a valid number between 1 and 10080 minutes (1 week).');
            }
        }

        function scheduleReminder() {
            const input = document.getElementById("scheduleInput").value;
            if (!input) {
                showMessage('countdown', 'Please select a date and time.');
                return;
            }

            const targetTime = new Date(input).getTime();
            const now = Date.now();
            const msUntil = targetTime - now;

            if (msUntil <= 0) {
                showMessage('countdown', 'Please pick a future time.');
                return;
            }

            if (msUntil > 604800000) { // More than 1 week
                showMessage('countdown', 'Please pick a time within the next week.');
                return;
            }

            // Clear any existing scheduled reminder
            if (activeReminders.scheduled) {
                clearInterval(activeReminders.scheduled);
            }

            updateBoxState('scheduledReminder', true);
            showMessage('countdown', 'Reminder scheduled!');
            const countdownEl = document.getElementById("countdown");

            const interval = setInterval(() => {
                const remaining = targetTime - Date.now();
                if (remaining <= 0) {
                    clearInterval(interval);
                    countdownEl.textContent = "";
                    updateBoxState('scheduledReminder', false);
                    alert("Reminder time reached!");
                } else {
                    countdownEl.textContent = `Time remaining: ${formatTime(remaining)}`;
                }
            }, 1000);

            activeReminders.scheduled = interval;
        }

        // Set minimum datetime to current time and maximum to 1 week from now
        const now = new Date();
        const maxDate = new Date(now.getTime() + 604800000); // 1 week from now
        document.getElementById('scheduleInput').min = now.toISOString().slice(0, 16);
        document.getElementById('scheduleInput').max = maxDate.toISOString().slice(0, 16);
    </script>
</body>
</html>
