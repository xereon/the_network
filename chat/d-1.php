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

  <!-- JavaScript code for text color and chat form settings -->
  <script>
const openMenuBtn = document.getElementById('openMenuBtn');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const closeMenuBtn2 = document.getElementById('closeMenuBtn2');
const toggleMenuBtn = document.getElementById('toggleMenuBtn');
const settingsMenu = document.getElementById('settingsMenu');
const textColorInput = document.getElementById('textColor');
const gradientStop = document.querySelector('stop');
const chatForm = document.getElementById('chatForm');

openMenuBtn.addEventListener('click', () => {
    settingsMenu.classList.add('open');
    document.querySelector('svg').style.display = 'block';
});

closeMenuBtn.addEventListener('click', () => {
    settingsMenu.classList.remove('open');
    document.querySelector('svg').style.display = 'block';
});

closeMenuBtn2.addEventListener('click', () => {
    settingsMenu.classList.remove('open');
    document.querySelector('svg').style.display = 'block';
});

const applyColors = (color) => {
    document.body.style.color = color;
    gradientStop.setAttribute('stop-color', color);
    dataDarkreaderInlineStopcolor.setAttribute('stop-color', color);
    chatForm.style.backgroundColor = color; // Change background color of #chatForm
    chatForm.style.color = color; // Change text color of #chatForm
};


// Function to load the chosen color from local storage and apply it
const loadChosenColor = () => {
    const chosenColor = localStorage.getItem('chosenColor');
    console.log('Chosen color from local storage:', chosenColor);
    if (chosenColor) {
        applyColors(chosenColor);
        // Set the value of the input to the chosen color
        textColorInput.value = chosenColor;
    }
};

textColorInput.addEventListener('input', () => {
    const color = textColorInput.value;
    console.log('Selected color:', color);
    applyColors(color);
    // Save the chosen color to local storage and server
    saveChosenColor(color);
});

// Call the loadChosenColor function on page load to apply the previously chosen color
document.addEventListener('DOMContentLoaded', loadChosenColor);

toggleMenuBtn.addEventListener('click', () => {
    if (settingsMenu.classList.contains('open')) {
        settingsMenu.classList.remove('open');
    } else {
        settingsMenu.classList.add('open');
    }
});

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
        function readMessageOnArrival(message) {
            const readOnArrivalSwitch = document.getElementById('read-on-arrival-switch');
            const readOnArrival = readOnArrivalSwitch.checked;

            if (readOnArrival) {
                const text = message.textContent;
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

        // Read the messages on arrival
        const messages = document.querySelectorAll('.chat_data:nth-child(2) span:nth-child(4) b');
        messages.forEach(message => {
            readMessageOnArrival(message);
        });


    // Event listener to handle changes to the text color picker
    document.addEventListener('DOMContentLoaded', function() {
      // Code to add event listener for text color picker...
    });

    // Event listener to handle changes to the "Read Messages On Arrival" switch
    document.addEventListener('DOMContentLoaded', function() {
      // Code to add event listener for "Read Messages On Arrival" switch...
        // Read the messages on arrival
        const messages = document.querySelectorAll('.chat_data:nth-child(2) span:nth-child(4) b');
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
      // Event listener to update the voice settings in local storage when the inputs change
    const voiceSelect = document.getElementById('voice-select');
    const pitchSlider = document.getElementById('pitch-slider');
    const rateSlider = document.getElementById('rate-slider');
    const volumeSlider = document.getElementById('volume-slider');

    voiceSelect.addEventListener('change', saveVoiceSettings);
    pitchSlider.addEventListener('change', saveVoiceSettings);
    rateSlider.addEventListener('change', saveVoiceSettings);
    volumeSlider.addEventListener('change', saveVoiceSettings);
    

    // Event listener to update voice selection dropdown when voices change
    document.addEventListener('DOMContentLoaded', async function () {
      // Code to add event listener for voice selection dropdown...
    });

    // Event listener to update the voice settings in local storage when the inputs change
    document.addEventListener('DOMContentLoaded', function () {
      // Code to add event listener for voice settings...
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