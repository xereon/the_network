<?php
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL);

include 'db.php';
ob_start();
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header('location: index.php');
    exit;
}
ob_end_flush();
// Get the user ID based on the user email from the session
$user_email = $_SESSION['user_email'];
$query_user = "SELECT user_id FROM users WHERE user_email = ?";
$stmt_user = mysqli_prepare($connect, $query_user);
mysqli_stmt_bind_param($stmt_user, "s", $user_email);
mysqli_stmt_execute($stmt_user);
$result_user = mysqli_stmt_get_result($stmt_user);
$user_data = mysqli_fetch_assoc($result_user);
$user_id = $user_data['user_id'];

// Retrieve the active sessions for the user
$query_active_sessions = "SELECT * FROM active_sessions WHERE user_id = ?";
$stmt_active_sessions = mysqli_prepare($connect, $query_active_sessions);
mysqli_stmt_bind_param($stmt_active_sessions, "i", $user_id);
mysqli_stmt_execute($stmt_active_sessions);
$result_active_sessions = mysqli_stmt_get_result($stmt_active_sessions);

// Display the active session data
// echo "<h1>Active Sessions:</h1>";
// echo "<ul>";
// while ($active_session = mysqli_fetch_assoc($result_active_sessions)) {
//     echo "<li>Session ID: " . $active_session['session_id'] . "</li>";
//     echo "<li>Login Time: " . $active_session['login_time'] . "</li>";
//     echo "<br>";
// }
// echo "</ul>";

// Close the prepared statements
mysqli_stmt_close($stmt_user);
mysqli_stmt_close($stmt_active_sessions);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Live Chat</title>
    <meta name="theme-color" content="#293a4a">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" media="all">
    <link rel="stylesheet" href="styles/style.css" media="all">
    <link rel="stylesheet" href="styles/styles.css" media="all">
    <link rel="stylesheet" href="styles/home.css" media="all">
<script>
var totalMessages = 0; // Global variable to keep track of total messages

    // Variable to show or hide delete button, default is 'false'
    let showDeleteButton = localStorage.getItem('deleteButton') === 'true';

document.addEventListener('DOMContentLoaded', function() {

    // Get the delete toggle switch
    const deleteToggleSwitch = document.getElementById('deleteToggle');

    // Event listener for the delete toggle switch
    deleteToggleSwitch.addEventListener('change', () => {
        showDeleteButton = deleteToggleSwitch.checked;
        localStorage.setItem('deleteButton', showDeleteButton);
        // Refresh the chat to apply changes
        ajax();
    });

    // Set initial state of the delete toggle switch based on saved preference
    deleteToggleSwitch.checked = showDeleteButton;
});

function ajax() {
    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('chat').innerHTML = req.responseText;

            var div = document.createElement('div');
            div.innerHTML = req.responseText;
            var totalMessagesDiv = div.querySelector('.total_messages');
            var newTotalMessages = parseInt(totalMessagesDiv.textContent.replace(/\D/g, ''));

            // If there's a new message, read it and play the sound
            if (newTotalMessages > totalMessages) {
                // Extract the new message and read it
                var newMessageText = req.responseText.match(/<span><b>(.*?)<\/b> <\/span>/)[1];
                if (newMessageText) {
                    readMessageOnArrival(newMessageText);
                }

                const muteSoundSwitch = document.getElementById('mute-sound-switch');

                if (muteSoundSwitch.checked) { // Play the sound only if not muted
                    var soundElement = new Audio('message-received.mp3');
                    soundElement.loop = false; // Ensure that looping is off
                    soundElement.play();
                }
            }

            // Update the total messages count
            totalMessages = newTotalMessages;
        }
    };

    // Append a query parameter to indicate the state of the delete button switch
    req.open('GET', 'chat.php?showDeleteButton=' + showDeleteButton, true);
    req.send();
}

setInterval(function() { ajax() }, 1000);

</script>
<style>
.back-to-home-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #42b983;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.back-to-home-button:hover {
    background-color: #349e74;
}
</style>
</head>
<body onload="ajax();">
<!--?php include ('header_svg.php'); ?-->
<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%'  xmlns:xlink='http://www.w3.org/1999/xlink'>
	<radialGradient id='g' gradientUnits='userSpaceOnUse' cx='0' cy='0' r='40%'>
		<stop offset='0%' stop-opacity='0' stop-color='#fff' />
		<stop offset='100%' stop-opacity='.3'  stop-color='#1A75B9' />
	</radialGradient>
	<radialGradient id='g2' gradientUnits='userSpaceOnUse' cx='0' cy='0' r='40%'>
		<stop offset='0%' stop-opacity='.1' stop-color='#fff' />
		<stop offset='50%' stop-opacity='.5'  stop-color='#1A75B9' />
		<stop offset='100%' stop-opacity='.9'  stop-color='#1A75B9' />
	</radialGradient>
	<rect x='0' y='0' width='110%' height='110%' fill='url(#g)'/>
	<svg x='0' y='0' overflow='visible'>
		<line id='l' x1='0%' x2='0' y1='0' y2='1000%' style='stroke:#fff; stroke-width:0.8;' transform='rotate(0)'/>
		<use xlink:href='#l' transform='rotate(-2.5714285714285716)' />
		<use xlink:href='#l' transform='rotate(-5.142857142857143)' />
		<use xlink:href='#l' transform='rotate(-7.714285714285715)' />
		<use xlink:href='#l' transform='rotate(-10.285714285714286)' />
		<use xlink:href='#l' transform='rotate(-12.857142857142858)' />
		<use xlink:href='#l' transform='rotate(-15.42857142857143)' />
		<use xlink:href='#l' transform='rotate(-18)' />
		<use xlink:href='#l' transform='rotate(-20.571428571428573)' />
		<use xlink:href='#l' transform='rotate(-23.142857142857146)' />
		<use xlink:href='#l' transform='rotate(-25.714285714285715)' />
		<use xlink:href='#l' transform='rotate(-28.28571428571429)' />
		<use xlink:href='#l' transform='rotate(-30.85714285714286)' />
		<use xlink:href='#l' transform='rotate(-33.42857142857143)' />
		<use xlink:href='#l' transform='rotate(-36)' />
		<use xlink:href='#l' transform='rotate(-38.57142857142858)' />
		<use xlink:href='#l' transform='rotate(-41.142857142857146)' />
		<use xlink:href='#l' transform='rotate(-43.714285714285715)' />
		<use xlink:href='#l' transform='rotate(-46.28571428571429)' />
		<use xlink:href='#l' transform='rotate(-48.85714285714286)' />
		<use xlink:href='#l' transform='rotate(-51.42857142857143)' />
		<use xlink:href='#l' transform='rotate(-54.00000000000001)' />
		<use xlink:href='#l' transform='rotate(-56.57142857142858)' />
		<use xlink:href='#l' transform='rotate(-59.142857142857146)' />
		<use xlink:href='#l' transform='rotate(-61.71428571428572)' />
		<use xlink:href='#l' transform='rotate(-64.28571428571429)' />
		<use xlink:href='#l' transform='rotate(-66.85714285714286)' />
		<use xlink:href='#l' transform='rotate(-69.42857142857143)' />
		<use xlink:href='#l' transform='rotate(-72)' />
		<use xlink:href='#l' transform='rotate(-74.57142857142858)' />
		<use xlink:href='#l' transform='rotate(-77.14285714285715)' />
		<use xlink:href='#l' transform='rotate(-79.71428571428572)' />
		<use xlink:href='#l' transform='rotate(-82.28571428571429)' />
		<use xlink:href='#l' transform='rotate(-84.85714285714286)' />
		<use xlink:href='#l' transform='rotate(-87.42857142857143)' />
		<use xlink:href='#l' transform='rotate(-90)' />
	</svg>
	<rect x='0' y='0' width='110%' height='110%' fill='url(#g2)'/>
</svg>
<div class="menu-content">
<button id="openMenuBtn"><h1 id="toggleMenuBtn" class="logo">menu</h1></button>
    <div id="settingsMenu">
    <center><h2>Settings</h2></center>
    <div class="setting">
            <label>Day/Night</label>
        <label for="day-night-switch" class="switch">
            <input type="checkbox" id="day-night-switch" class="toggle-switch">
            <span class="slider round switch"></span>
        </label>
    </div>
    <div class="setting">
        <label>Message Sound:</label> 
        <label for="mute-sound-switch" class="switch">
            <input type="checkbox" id="mute-sound-switch" class="toggle-switch">
            <span class="slider round switch"></span>
        </label>
    </div>
    <div class="setting">
    <label>
        Delete Button:
        <input type="checkbox" id="deleteToggle" class="toggle-switch" />
    </label>
</div>

            <div class="setting">
                <label>Read new message</label><br />
                <label for="read-on-arrival-switch" class="switch">
                    <input type="checkbox" id="read-on-arrival-switch" class="toggle-switch" checked>
                    <span class="slider round switch"></span>
                </label>
            </div>

        <!-- <div class="setting">
            <label for="background-color-picker">Page:</label>
            <input type="color" id="background-color-picker">
            <button id="clear-background-color-btn">Clear</button>
        </div> -->
        <!-- Add the new setting for text color -->
        <!-- <div class="setting">
            <label for="text-color-picker">Text:</label>
            <input type="color" id="text-color-picker">
	    <button id="clear-text-color-btn">Clear</button>
        </div> -->
            <!--?php
            // Retrieve members from the database
            $membersQuery = "SELECT * FROM User";
            $membersStmt = $pdo->query($membersQuery);
            $members = $membersStmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="members-list">
                <h2>Members</h2>
                <ul>
                    <--?php
                    foreach ($members as $member) {
                        echo "<li>{$member['username']}</li>";
                    }
                    ?>
                </ul>
            </div-->
            
             <!-- Add the new settings for voice selection, pitch, rate, and volume -->
                <label for="voice-select">Select Voice:</label>
                <select id="voice-select"></select>

                <label for="pitch-slider">Pitch:</label>
                <input type="range" id="pitch-slider" min="0" max="2" step="0.1" value="1">

                <label for="rate-slider">Rate:</label>
                <input type="range" id="rate-slider" min="0.5" max="2" step="0.1" value="1">

                <label for="volume-slider">Volume:</label>
                <input type="range" id="volume-slider" min="0" max="1" step="0.1" value="1">
        <label for="textColor">Text Color:</label>
        <input type="color" id="textColor">
        <button id="closeMenuBtn">&times; Close</button>
        <!-- <button id="closeMenuBtn2" style="position: absolute; top:7px;">&times; Close</button> -->

    </div>

                </div>
<div class="container">
    <div class="chat_box">
        <div id="chat"></div>
        <div class="chat_input_wrap">
            <form method="post" action="">
            <textarea id="chatForm" autofocus="autofocus" required="required" name="msg" placeholder="Send a message"></textarea>                
            <div class="send_button">
                    <input type="submit" name="submit" value="Send" />
                </div>
            </form>
        </div>
        <div class="logout_button_wrap">
    <form class="logout_form" method="post" action="logout.php">
        <input type="submit" name="logout" value="Logout">
    </form>
	    <a href="../home.php" class="back-to-home-button">Back to Home</a>
</div>
</div>
<?php
global $connect;

// Check if the message is submitted and not empty
if (isset($_POST['submit']) && !empty($_POST['msg'])) {
    $msg = $_POST['msg'];
    $user_email = $_SESSION['user_email'];

    // Retrieve user_id based on the user_email from session
    $query_user = "SELECT user_id FROM users WHERE user_email = ?";
    $stmt_user = mysqli_prepare($connect, $query_user);
    mysqli_stmt_bind_param($stmt_user, "s", $user_email);
    mysqli_stmt_execute($stmt_user);
    $result_user = mysqli_stmt_get_result($stmt_user);
    $user_data = mysqli_fetch_assoc($result_user);
    $user_id = $user_data['user_id'];

    // Use the user_id in the INSERT query
    $query = "INSERT INTO chat (user_id, msg) VALUES (?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $msg);

    if (mysqli_stmt_execute($stmt)) {
        // Set the $_SESSION["new_message"] variable to 1 when a new message is inserted
        $_SESSION["new_message"] = 1;
        // Instead of echoing the audio element, redirect to the same page (PRG pattern)
        header("HTTP/1.1 303 See Other");
        header("Location: ".$_SERVER['REQUEST_URI']); // Redirect to the current page
    }
    mysqli_stmt_close($stmt);
}
ob_clean();
?>
</div>
<script>

// Get the delete toggle switch
const deleteToggle = document.getElementById('deleteToggle');

// Function to update the delete button's visibility based on the toggle's state
function toggleDeleteButton() {
    const deleteButtons = document.querySelectorAll('.chat_data span[title="Delete"]');
    const displayStyle = deleteToggle.checked ? 'inline' : 'none';
    deleteButtons.forEach(button => {
        button.style.display = displayStyle;
    });
}

// Event listener for the delete toggle
deleteToggle.addEventListener('change', () => {
    toggleDeleteButton();
    localStorage.setItem('deleteButton', deleteToggle.checked);
});

// Function to load the delete setting on page load
function loadDeleteSetting() {
    const deleteButtonSetting = localStorage.getItem('deleteButton') === 'true';
    deleteToggle.checked = deleteButtonSetting;
    toggleDeleteButton();
}

// Call the loadDeleteSetting function on page load
document.addEventListener('DOMContentLoaded', loadDeleteSetting);
</script>
<script>
    function applyMuteSoundSetting() {
    const muteSoundSwitch = document.getElementById('mute-sound-switch');
    const muteSound = muteSoundSwitch.checked;
    localStorage.setItem('muteSound', muteSound);
    }

    function loadMuteSoundSetting() {
    const muteSoundSwitch = document.getElementById('mute-sound-switch');
    const muteSound = JSON.parse(localStorage.getItem('muteSound'));
    if (muteSound !== null) {
        muteSoundSwitch.checked = muteSound;
    }
    }

    const muteSoundSwitch = document.getElementById('mute-sound-switch');
    muteSoundSwitch.addEventListener('change', applyMuteSoundSetting);

    loadMuteSoundSetting();
</script>
  <!-- JavaScript code for theme preferences -->
  <script>
        // Function to toggle day/night mode
        function toggleDayNightMode() {
            const dayNightSwitch = document.getElementById('day-night-switch');
            const body = document.body;
            if (dayNightSwitch.checked) {
                body.classList.add('night-mode');
                localStorage.setItem('themePreference', 'night');
            } else {
                body.classList.remove('night-mode');
                localStorage.setItem('themePreference', 'day');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dayNightSwitch = document.getElementById('day-night-switch');
            dayNightSwitch.addEventListener('change', toggleDayNightMode);

            const themePreference = localStorage.getItem('themePreference');
            if (themePreference === 'night') {
                dayNightSwitch.checked = true;
                document.body.classList.add('night-mode');
            }
        });
</script>
<script>
    // Function to load the theme preference from local storage
    function loadThemePreference() {
    const themePreference = localStorage.getItem('themePreference');
    console.log('Theme preference from local storage:', themePreference);

    // Assuming you have a dayNightSwitch element with an id in your HTML.
    const dayNightSwitch = document.getElementById('day-night-switch');

    if (themePreference === 'night') {
        dayNightSwitch.checked = true;
        document.body.classList.add('night-mode');
    } else {
        dayNightSwitch.checked = false;
        document.body.classList.remove('night-mode');
    }
    }

// Call the loadThemePreference function on page load to apply the theme preference
document.addEventListener('DOMContentLoaded', loadThemePreference);


    // Event listener to handle changes to the day/night switch
    document.addEventListener('DOMContentLoaded', function () {
            const dayNightSwitch = document.getElementById('day-night-switch');
            dayNightSwitch.addEventListener('change', toggleDayNightMode);

            const themePreference = localStorage.getItem('themePreference');
            if (themePreference === 'night') {
                dayNightSwitch.checked = true;
                document.body.classList.add('night-mode');
            }
        });
  </script>
<script>
// JavaScript code for text color and chat form settings
const openMenuBtn = document.getElementById('openMenuBtn');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const toggleMenuBtn = document.getElementById('toggleMenuBtn');
const settingsMenu = document.getElementById('settingsMenu');
const textColorInput = document.getElementById('textColor');
const gradientStop = document.querySelector('stop');
const chatForm = document.getElementById('chatForm');

// Function to apply the chosen text color
function applyTextColor(color) {
    const chatTextElements = document.querySelectorAll('.chat_data b');
    chatTextElements.forEach(element => {
        element.style.color = color;
    });
    document.body.style.color = color;
    gradientStop.setAttribute('stop-color', color);
    // chatForm.style.backgroundColor = color;
    chatForm.style.color = color;
}

// Function to load the chosen text color from local storage
function loadChosenColor() {
    const chosenColor = localStorage.getItem('chosenColor');
    if (chosenColor) {
        applyTextColor(chosenColor);
        document.getElementById('textColor').value = chosenColor;
    }
}

openMenuBtn.addEventListener('click', () => {
    settingsMenu.classList.add('open');
    document.querySelector('svg').style.display = 'block';
});

closeMenuBtn.addEventListener('click', () => {
    settingsMenu.classList.remove('open');
    document.querySelector('svg').style.display = 'block';
});

textColorInput.addEventListener('input', () => {
    const color = textColorInput.value;
    applyTextColor(color);
    localStorage.setItem('chosenColor', color);
});

toggleMenuBtn.addEventListener('click', () => {
    if (settingsMenu.classList.contains('open')) {
        settingsMenu.classList.remove('open');
    } else {
        settingsMenu.classList.add('open');
    }
});

// Call the loadChosenColor function on page load
document.addEventListener('DOMContentLoaded', loadChosenColor);
</script>
<script>
          // Function to apply the "Read Messages On Arrival" setting
          function applyReadOnArrivalSetting() {
            const readOnArrivalSwitch = document.getElementById('read-on-arrival-switch');
            const readOnArrival = readOnArrivalSwitch.checked;
            localStorage.setItem('readOnArrival', readOnArrival);
        }

        // Function to load the "Read Messages On Arrival" setting from local storage
        function loadReadOnArrivalSetting() {
            const readOnArrivalSwitch = document.getElementById('read-on-arrival-switch');
            const readOnArrival = JSON.parse(localStorage.getItem('readOnArrival'));
            if (readOnArrival !== null) {
                readOnArrivalSwitch.checked = readOnArrival;
            }
        }

        // Function to read the message automatically on arrival
        function readMessageOnArrival(messageText) {
            const readOnArrivalSwitch = document.getElementById('read-on-arrival-switch');
            const readOnArrival = readOnArrivalSwitch.checked;

            if (readOnArrival) {
                const text = messageText;
                const utterance = new SpeechSynthesisUtterance(text);
                const voices = speechSynthesis.getVoices();
                const selectedVoice = document.getElementById('voice-select').value;
                const selectedPitch = parseFloat(document.getElementById('pitch-slider').value);
                const selectedRate = parseFloat(document.getElementById('rate-slider').value);
                const selectedVolume = parseFloat(document.getElementById('volume-slider').value);

                utterance.voice = voices.find(voice => voice.name === selectedVoice);
                utterance.pitch = selectedPitch;
                utterance.rate = selectedRate;
                utterance.volume = selectedVolume;

                speechSynthesis.speak(utterance);
            }
        }


        // Add event listener for the "Read Messages On Arrival" switch
        const readOnArrivalSwitch = document.getElementById('read-on-arrival-switch');
        readOnArrivalSwitch.addEventListener('change', applyReadOnArrivalSetting);

        // Call the functions to load the settings on page load
        loadReadOnArrivalSetting();

</Script>
<script>
        // Event listener to handle changes to the "Read Messages On Arrival" switch
        document.addEventListener('DOMContentLoaded', function() {
      // Code to add event listener for "Read Messages On Arrival" switch...
        // Read the messages on arrival
        const messages = document.querySelectorAll('.chat_data:nth-child(2) span:nth-child(3) b');
        messages.forEach(message => {
            readMessageOnArrival(message);
        });
    });
    </script>

  <!-- JavaScript code for voice settings -->
  <script>
    // Function to fetch and store available voices
    function fetchVoices() {
        return new Promise(resolve => {
            let voices = speechSynthesis.getVoices();
            if (voices.length !== 0) {
                resolve(voices);
                } else {
                speechSynthesis.onvoiceschanged = () => {
                    voices = speechSynthesis.getVoices();
                    resolve(voices);
                };
            }
        });
    }
</script>
<script>
    // Function to play text with selected voice and options
    function playText(button) {
             const textToSpeak = button.previousSibling.textContent.trim();
            const utterance = new SpeechSynthesisUtterance(textToSpeak);

            // Set the voice to the selected voice from the dropdown
            const voiceSelect = document.getElementById('voice-select');
            const selectedVoice = voiceSelect.value;
            const voices = speechSynthesis.getVoices();
            const selectedVoiceObj = voices.find((voice) => voice.name === selectedVoice);
            utterance.voice = selectedVoiceObj;

            // Set the pitch, rate, and volume if needed (you can add sliders for these in the settings)
            const pitchSlider = document.getElementById('pitch-slider');
            const rateSlider = document.getElementById('rate-slider');
            const volumeSlider = document.getElementById('volume-slider');
            utterance.pitch = pitchSlider.value;
            utterance.rate = rateSlider.value;
            utterance.volume = volumeSlider.value;

             // Speak the text
            speechSynthesis.speak(utterance);
    }

     // Function to save the voice settings to local storage
     function saveVoiceSettings() {
        const voiceSelect = document.getElementById('voice-select');
        const pitchSlider = document.getElementById('pitch-slider');
        const rateSlider = document.getElementById('rate-slider');
        const volumeSlider = document.getElementById('volume-slider');

        localStorage.setItem('selectedVoice', voiceSelect.value);
        localStorage.setItem('selectedPitch', pitchSlider.value);
        localStorage.setItem('selectedRate', rateSlider.value);
        localStorage.setItem('selectedVolume', volumeSlider.value);
    }

    // Function to load the voice settings from local storage
    function loadVoiceSettings() {
    
        const voiceSelect = document.getElementById('voice-select');
        const pitchSlider = document.getElementById('pitch-slider');
        const rateSlider = document.getElementById('rate-slider');
        const volumeSlider = document.getElementById('volume-slider');
        const selectedVoice = localStorage.getItem('selectedVoice');
        const selectedPitch = localStorage.getItem('selectedPitch');
        const selectedRate = localStorage.getItem('selectedRate');
        const selectedVolume = localStorage.getItem('selectedVolume');

        if (selectedVoice) {
            voiceSelect.value = selectedVoice;
        }

        if (selectedPitch) {
            pitchSlider.value = selectedPitch;
        }

        if (selectedRate) {
            rateSlider.value = selectedRate;
        }

        if (selectedVolume) {
            volumeSlider.value = selectedVolume;
        }
    }

    // Event listener to update voice selection dropdown when voices change
    document.addEventListener('DOMContentLoaded', async function () {
          // Function to populate voice selection dropdown
    async function populateVoices() {
            const voices = await fetchVoices();
            const voiceSelect = document.getElementById('voice-select');
            voiceSelect.innerHTML = '';

            voices.forEach(voice => {
                const option = document.createElement('option');
                option.textContent = voice.name;
                option.value = voice.name;
                voiceSelect.appendChild(option);
            });
        }
        
        // Event listener to update voice selection dropdown when voices change
        speechSynthesis.addEventListener('voiceschanged', populateVoices);

        // Call populateVoices initially to populate the dropdown on page load
        populateVoices();
    });

    // Event listener to update the voice settings in local storage when the inputs change
    document.addEventListener('DOMContentLoaded', function () {
    const voiceSelect = document.getElementById('voice-select');
    const pitchSlider = document.getElementById('pitch-slider');
    const rateSlider = document.getElementById('rate-slider');
    const volumeSlider = document.getElementById('volume-slider');

    voiceSelect.addEventListener('change', saveVoiceSettings);
    pitchSlider.addEventListener('change', saveVoiceSettings);
    rateSlider.addEventListener('change', saveVoiceSettings);
    volumeSlider.addEventListener('change', saveVoiceSettings);
    });
  </script>

  <!-- JavaScript code to set focus on the text area on page load -->
  <script>
    // Event listener to set focus on the text area when the page loads
    document.addEventListener('DOMContentLoaded', function () {
        // Function to set focus on the text area on page load
    function setFocusOnTextArea() {
        const msgInput = document.getElementById('chatForm');
        msgInput.focus();
    }

    // Call the function to set focus on the text area when the page loads
    setFocusOnTextArea();
    });
  </script>

  <!-- JavaScript code to send the message and set focus to the text input -->
  <script>
    // Function to send the message and set the focus to the text input
    function sendMessageAndFocus() {
        const msgInput = document.getElementById('chatForm');
        const message = msgInput.value.trim();

        // If the message is not empty, proceed to send it
        if (message !== '') {
            // ... Code to send the message (same as you have now) ...

            // Clear the text input after sending the message
            msgInput.value = '';

            // Set the focus back to the text input
            msgInput.focus();
        }
    }

    // Event listener for the form submission
    document.addEventListener('DOMContentLoaded', function () {
        chatForm.addEventListener('submit', function (event) {
        event.preventDefault();
        sendMessageAndFocus();
    });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    loadThemePreference();
    loadChosenColor();
    loadVoiceSettings();
    loadReadOnArrivalSetting();
    // other loading functions here...

    // Event listeners for settings changes
    const dayNightSwitch = document.getElementById('day-night-switch');
    dayNightSwitch.addEventListener('change', toggleDayNightMode);

    // Text Color
    const textColorInput = document.getElementById('textColor');
    textColorInput.addEventListener('input', () => {
        const color = textColorInput.value;
        applyTextColor(color);
        localStorage.setItem('chosenColor', color);
    });

    // Voice Settings
    // Add event listeners for voice, pitch, rate, and volume changes
    // Save them to localStorage and load them on page load
    const voiceSelect = document.getElementById('voice-select');
    voiceSelect.addEventListener('change', saveVoiceSettings);

    // Read Messages On Arrival
    const readOnArrivalSwitch = document.getElementById('read-on-arrival-switch');
    readOnArrivalSwitch.addEventListener('change', applyReadOnArrivalSetting);

    // Load the saved settings on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadChosenColor();
        loadMuteSoundSetting();
        loadThemePreference();
        loadReadOnArrivalSetting();
    });
});



function saveVoiceSettings() {
    const selectedVoice = document.getElementById('voice-select').value;
    const selectedPitch = parseFloat(document.getElementById('pitch-slider').value);
    const selectedRate = parseFloat(document.getElementById('rate-slider').value);
    const selectedVolume = parseFloat(document.getElementById('volume-slider').value);

    localStorage.setItem('voiceSettings', JSON.stringify({
        voice: selectedVoice,
        pitch: selectedPitch,
        rate: selectedRate,
        volume: selectedVolume
    }));
}

function loadVoiceSettings() {
    const voiceSettings = JSON.parse(localStorage.getItem('voiceSettings'));
    if (voiceSettings) {
        document.getElementById('voice-select').value = voiceSettings.voice;
        document.getElementById('pitch-slider').value = voiceSettings.pitch;
        document.getElementById('rate-slider').value = voiceSettings.rate;
        document.getElementById('volume-slider').value = voiceSettings.volume;
    }
}
  </script>

</body>
</html> 
