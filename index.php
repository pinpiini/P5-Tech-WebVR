  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dark Themed Website</title>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="index.css">
  </head>
  <body>
      
      <nav>
          <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><button id="open-chatbot">Librabot</button></li> <!-- Button to open sidebar -->
          </ul>
      </nav>
      <div class="content">
          <div class="content-text">
          <h1>PESAT Digital Library</h1>
          <p>Temukan buku-buku favoritmu di sini!</p>
          <a href="sign/link_login.html"><button class="btn btn-primary me-2" >Login</button></a>
          <a href="perpus.html"><button class="btn btn-primary me-2" >Virtual Library</button></a>
        
          </div>
      </div>

      <footer>
          <p>&copy; 2024 P5 Kelompok 1</p>
      </footer>

      <div id="sidebar" class="sidebar">
      <div class="chat-container">
      <button id="close-chatbot">Close</button>
      <div class="chat-header">
        <img src="assets/ppbot1.jpg" alt="Bot Profile" class="bot-profile">
        <span class="bot-name">Lisa 
        <div class="menu">
          <span class="menu-dot"></span>
          <span class="menu-dot"></span>
          <span class="menu-dot"></span>
          <div class="menu-content">
    
            <button onclick="resetChat()">Clear Chat</button>
            <button id="speech-toggle-button" class="speech-toggle-button" onclick="toggleSpeech()">Speech: OFF ✗</button>

           
          </div>
        </div>
      </div>
      <div id="chat-box" class="chat-box"></div>
      <div class="typing-indicator" id="typing-indicator">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
      <div class="input-box">
        <input type="text" id="user-input" placeholder="Type a message...">
        <button onclick="sendMessage()">Send</button>
      </div>
    </div>
      </div>

      <script src="scripts.js"></script>
      <script>
        // Get elements
        document.addEventListener('DOMContentLoaded', function() {
    var sidebar = document.getElementById('sidebar');
    var openButton = document.getElementById('open-chatbot');
    var closeButton = document.getElementById('close-chatbot');
    var content = document.querySelector('.content');

    openButton.addEventListener('click', function() {
        sidebar.style.right = '0';
    });

    closeButton.addEventListener('click', function() {
        sidebar.style.right = '-300px';
    });

    content.addEventListener('click', function() {
        sidebar.style.right = '-300px';
    });
});

// Global variable to track TTS state
let speechEnabled = false;

// Function to toggle speech
function toggleSpeech() {
  speechEnabled = !speechEnabled;
  const speechToggleButton = document.getElementById("speech-toggle-button");
  if (speechEnabled) {
    speechToggleButton.textContent = "Speech: ON ✓";
  } else {
    speechToggleButton.textContent = "Speech: OFF ✗";
  }
}

// Function to speak the bot's reply
function speakBotReply(text) {
  if ('speechSynthesis' in window) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'id-ID'; // Set language to Indonesian
    speechSynthesis.speak(utterance);
  } else {
    console.error("Speech synthesis not supported.");
  }
}

// Function to add bot message with optional speech
function addBotMessage(text, withLink = false) {
  const chatBox = document.getElementById("chat-box");
  const messageElement = createMessageElement("bot", text, withLink);
  chatBox.appendChild(messageElement);
  chatBox.scrollTop = chatBox.scrollHeight;

  // Speak the bot's reply if speech is enabled
  if (speechEnabled) {
    speakBotReply(text);
  }
}




      </script>
  </body>
  </html>
