<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessibility Widget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            transition: all 0.3s ease;
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

        #accessibility-toggle {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #ffc800;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            z-index: 999;
        }

        #accessibility-panel {
            display: none;
            position: fixed;
            top: 60px;
            right: 10px;
            background: white;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            width: 250px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .accessibility-button {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            background-color: #877933;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .accessibility-button:hover {
            background-color: #6b5f2a;
        }

        .content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        img {
            width: 200px;
            height: 150px;
            margin: 10px;
            border-radius: 4px;
            cursor: pointer;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }

        li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #4CAF50;
        }

        /* Error message styling */
        .error-message {
            display: none;
            color: #ff0000;
            background-color: #ffe6e6;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="nav-links">
        <a href="reminders.php">Tools</a>
        <a href="education.php">Education</a>
        <a href="widget.php">Accessibility</a>
        <a href="calendar.php">Calendar</a>
    </div>

    <button id="accessibility-toggle">♿ Accessibility</button>

    <div id="accessibility-panel">
        <button class="accessibility-button" onclick="changeTextSize(10)">A+ Increase Text</button>
        <button class="accessibility-button" onclick="changeTextSize(-10)">A- Decrease Text</button>
        <button class="accessibility-button" onclick="toggleContrast()">Toggle High Contrast</button>
        <button class="accessibility-button" id="tts-toggle">🔊 Toggle Text-to-Speech</button>
    </div>

    <div id="error-message" class="error-message"></div>

    <div class="content">
        <h1>Welcome to Insul-In-Sync</h1>
        <p>
            <strong>Insul-In-Sync</strong> is a user-friendly platform designed to help individuals—especially older adults and people with disabilities—manage their diabetes more effectively. With features like blood glucose logging, personalized insights, caregiver dashboards, and emergency contact tools, Insul-In-Sync empowers users to take control of their health and live more independently.
        </p>

        <h2>Using the Accessibility Widget</h2>
        <p>
            To ensure an inclusive experience for all, we've included an <strong>Accessibility Widget</strong> located at the top-right corner of the screen (marked with the ♿ symbol).
        </p>
        <ul>
            <li><strong>A+ / A- Buttons:</strong> Increase or decrease the text size to improve readability.</li>
            <li><strong>High Contrast:</strong> Switch to a high-contrast color scheme for better visibility.</li>
            <li><strong>Text-to-Speech:</strong> Enable spoken feedback by clicking on images or selecting text—great for users with visual impairments or reading difficulties.</li>
        </ul>
        <p>
            Simply click the "Accessibility" button to reveal these options and customize your browsing experience to suit your needs.
        </p>

        <h2>Image Gallery</h2>
        <div class="image-gallery">
            <img src="Pictures/pic1.png" alt="Individual using a blood pressure monitor on their arm" onerror="handleImageError(this)">
            <img src="Pictures/pic2.png" alt="Syringe inserted into an insulin vial" onerror="handleImageError(this)">
            <img src="Pictures/pic3.png" alt="Healthy breakfast of fruits, oats and orange juice" onerror="handleImageError(this)">
            <img src="Pictures/pic4.png" alt="Someone using a blood extractor for a glucose test machine" onerror="handleImageError(this)">
            <img src="Pictures/pic5.png" alt="Someone running down a leafy autumn pathway" onerror="handleImageError(this)">
        </div>
    </div>

    <script>
        // Initialize variables
        let fontSize = 100;
        let highContrast = false;
        let ttsEnabled = false;
        let speechSynthesis = window.speechSynthesis;

        // DOM Elements
        const toggleButton = document.getElementById("accessibility-toggle");
        const panel = document.getElementById("accessibility-panel");
        const ttsButton = document.getElementById("tts-toggle");
        const errorMessage = document.getElementById("error-message");

        // Show error message
        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.style.display = "block";
            setTimeout(() => {
                errorMessage.style.display = "none";
            }, 5000);
        }

        // Handle image loading errors
        function handleImageError(img) {
            img.style.display = "none";
            showError(`Failed to load image: ${img.alt}`);
        }

        // Show/hide panel
        toggleButton.addEventListener("click", function() {
            panel.style.display = panel.style.display === "block" ? "none" : "block";
        });

        // Adjust text size
        function changeTextSize(delta) {
            try {
                fontSize = Math.min(200, Math.max(50, fontSize + delta));
                document.body.style.fontSize = fontSize + "%";
            } catch (error) {
                showError("Failed to change text size");
            }
        }

        // Toggle high contrast
        function toggleContrast() {
            try {
                highContrast = !highContrast;
                document.body.style.backgroundColor = highContrast ? "#000" : "#f5f5f5";
                document.body.style.color = highContrast ? "#FFF700" : "#333";
            } catch (error) {
                showError("Failed to toggle contrast");
            }
        }

        // Toggle TTS
        ttsButton.addEventListener("click", function() {
            try {
                ttsEnabled = !ttsEnabled;
                if (ttsEnabled) {
                    if (!speechSynthesis) {
                        showError("Text-to-Speech is not supported in your browser");
                        ttsEnabled = false;
                        return;
                    }
                    const testSpeech = new SpeechSynthesisUtterance("Text to speech enabled");
                    speechSynthesis.speak(testSpeech);
                }
            } catch (error) {
                showError("Failed to toggle text-to-speech");
                ttsEnabled = false;
            }
        });

        // Speak selected text
        document.addEventListener("mouseup", function() {
            if (!ttsEnabled || !speechSynthesis) return;
            
            try {
                const selection = window.getSelection().toString().trim();
                if (selection) {
                    const speech = new SpeechSynthesisUtterance(selection);
                    speechSynthesis.cancel();
                    speechSynthesis.speak(speech);
                }
            } catch (error) {
                showError("Failed to speak selected text");
            }
        });

        // Speak image alt on click
        document.querySelectorAll("img").forEach(img => {
            img.addEventListener("click", function() {
                if (!ttsEnabled || !speechSynthesis) return;
                
                try {
                    if (img.alt) {
                        const speech = new SpeechSynthesisUtterance(img.alt);
                        speechSynthesis.cancel();
                        speechSynthesis.speak(speech);
                    }
                } catch (error) {
                    showError("Failed to speak image description");
                }
            });
        });

        // Check for browser compatibility on load
        window.addEventListener("load", function() {
            if (!speechSynthesis) {
                showError("Text-to-Speech is not supported in your browser");
                ttsButton.disabled = true;
            }
        });
    </script>
</body>
</html>