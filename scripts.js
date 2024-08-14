document.addEventListener("DOMContentLoaded", function () {
  addBotMessage("Apa yang bisa saya bantu?");
  setupInputHandler();
  setupSpeechToggle();
});

let isSpeechEnabled = false;

function setupInputHandler() {
  const userInput = document.getElementById("user-input");
  userInput.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      sendMessage();
    }
  });

  const sendButton = document.getElementById("send-button");
  sendButton.addEventListener("click", sendMessage);
}

function setupSpeechToggle() {
  const speechToggleButton = document.getElementById("speech-toggle-button");
  speechToggleButton.addEventListener("click", function () {
    isSpeechEnabled = !isSpeechEnabled;
    updateSpeechToggleButton();
  });
  updateSpeechToggleButton();
}

function updateSpeechToggleButton() {
  const speechToggleButton = document.getElementById("speech-toggle-button");
  if (isSpeechEnabled) {
    speechToggleButton.textContent = "Speech: ON ✓";
  } else {
    speechToggleButton.textContent = "Speech: OFF ✗";
  }
}

function addBotMessage(text, withLink = false) {
  const chatBox = document.getElementById("chat-box");
  const messageElement = createMessageElement("bot", text, withLink);
  chatBox.appendChild(messageElement);
  chatBox.scrollTop = chatBox.scrollHeight;

  if (isSpeechEnabled) {
    speakText(text);
  }
}

function addUserMessage(text) {
  const chatBox = document.getElementById("chat-box");
  const messageElement = createMessageElement("user", text);
  chatBox.appendChild(messageElement);
  chatBox.scrollTop = chatBox.scrollHeight;
}

function createMessageElement(sender, text, withLink = false) {
  const message = document.createElement("div");
  message.classList.add("message", sender);

  const messageText = document.createElement("div");
  messageText.classList.add("text");
  messageText.textContent = text;

  const messageTime = document.createElement("div");
  messageTime.classList.add("time");
  const currentTime = new Date();
  messageTime.textContent = `${currentTime.getHours()}:${currentTime.getMinutes()}`;

  message.appendChild(messageText);
  message.appendChild(messageTime);

  if (withLink) {
    const linkButton = document.createElement("a");
    linkButton.href = "DashboardMember/buku/daftarBuku.php";
    linkButton.target = "_blank";
    linkButton.textContent = "Lihat lebih lanjut";
    linkButton.classList.add("link-button");
    message.appendChild(linkButton);
  }

  return message;
}

function sendMessage() {
  const userInput = document.getElementById("user-input");
  const userText = userInput.value.trim();
  if (userText === "") return;

  addUserMessage(userText);
  userInput.value = "";

  setTimeout(() => {
    const botReply = generateBotReply(userText);
    addBotMessage(botReply.text, botReply.withLink);
  }, 1000);
}

function generateBotReply(userText) {
  userText = userText.toLowerCase();
  userText = correctTypos(userText);

  if (/kamu siapa|nama|siapakah kamu/.test(userText)) {
    return { text: `Saya Librabot, asisten virtual perpustakaan digital pesat. Bagaimana saya bisa membantu Anda hari ini?`, withLink: false };
  } else if (/profil|info perpustakaan/.test(userText)) {
    return { text: `Perpustakaan digital kami menawarkan berbagai macam buku, jurnal, dan sumber daya lainnya yang dapat dibooking secara online oleh semua anggota.`, withLink: false };
  } else if (/lokasi|tempat|dimana|letak|perpustakaan/.test(userText)) {
    return { text: `Perpustakaan kami berada di tengah SMA PLUS PGRI CIBINONG, tepatnya di Lantai 2 depan ruang PDS. Kami senang menyambut Anda!`, withLink: false };
  } else if (/perpus/.test(userText)) {
    return { text: `Ya, Anda benar. Perpustakaan kami menawarkan berbagai sumber daya digital.`, withLink: true };
  } else if (/buku yang bagus|buku terbaik|buku untuk bosan|rekomendasi buku|rekomendasikan|rekomendasiin|tunjukan buku|spill buku/.test(userText)) {
    return { text: `Saya merekomendasikan : \n1. "SBY Selalu ada pilihan" \n2. "Kau, Aku dan Sepucuk Angpau Merah" \n3. "Bukan Salah Hujan". \nSelamat membaca!`, withLink: true };
  } else if (/banny/.test(userText)) {
    return { text: generateBannyResponse(), withLink: false };
  } else if (/halo sayang/.test(userText)) {
    return { text: generateLovingResponse(), withLink: false };
  } else if (/masa|emang iya|yakin/.test(userText)) {
    return { text: generateConfirmationResponse(), withLink: false };
  } else if (/test/.test(userText)) {
    return { text: generateGreetingResponse(), withLink: false };
  } else if (/hai|halo|kamu gimana|siapa kamu|hai disana/.test(userText)) {
    return { text: generateGreetingResponse(), withLink: false };
  } else if (/kemampuan mu/.test(userText)) {
    return { text: `Saya adalah asisten virtual perpustakaan digital. Saya bisa membantu Anda mencari buku, memberikan informasi tentang perpustakaan, dan menjawab pertanyaan umum lainnya.`, withLink: false };
  } else if (/saya bosan|membosankan|lapar|bingung/.test(userText)) {
    return { text: generateUserComplaintResponse(userText), withLink: false };
  } else if (isInappropriate(userText)) {
    return { text: handleInappropriateMessage(), withLink: false };
  } else {
    return { text: generateRandomResponse(), withLink: false };
  }
}

function generateUserComplaintResponse(userText) {
  const responses = {
    "saya bosan": [
      "Mungkin Anda bisa mencoba membaca buku yang menarik untuk menghibur diri.",
      "Saya punya beberapa rekomendasi buku yang mungkin bisa membuat Anda lebih tertarik. Ingin saya bagikan?",
      "Buku adalah teman yang baik ketika bosan. Apakah Anda tertarik untuk menemukan buku baru?",
      "Ada banyak buku menarik di perpustakaan kami. Mari kita cari sesuatu yang cocok untuk Anda.",
    ],
    "membosankan": [
      "Mungkin Anda perlu mengambil istirahat sejenak dan melakukan sesuatu yang menyenangkan.",
      "Jika Anda merasa bosan, mungkin ini saat yang tepat untuk mencari hobi baru atau mengeksplorasi minat Anda.",
      "Ketika kebosanan datang, mungkin saatnya untuk mencoba hal baru atau melakukan sesuatu yang kreatif.",
      "Bosan adalah kesempatan untuk menjelajahi sesuatu yang baru. Ada banyak kegiatan yang bisa Anda coba!",
    ],
    "lapar": [
      "Saya tidak bisa memberikan makanan, tetapi saya bisa merekomendasikan buku masak yang menarik jika Anda tertarik!",
      "Mungkin ini waktu yang tepat untuk mengambil camilan favorit Anda dan menikmatinya sambil membaca buku.",
      "Baca sambil makan adalah kombinasi yang bagus! Mungkin Anda bisa memilih buku favorit Anda dan menyiapkan camilan.",
      "Saya mengerti. Membaca bisa membuat kita lupa waktu. Mungkin ini saatnya untuk mengambil jeda dan makan sesuatu.",
    ],
    "bingung": [
      "Jika Anda bingung, mungkin membaca buku tentang topik yang Anda minati bisa membantu mencerahkan pikiran Anda.",
      "Buku seringkali bisa memberikan sudut pandang baru dan membantu kita memahami hal-hal yang kita bingung.",
      "Saat bingung, kadang membaca bisa memberikan inspirasi atau pemahaman yang baru. Mari kita cari buku yang sesuai dengan minat Anda.",
      "Saya punya beberapa rekomendasi buku yang mungkin bisa menjawab kebingungan Anda. Apakah Anda tertarik?",
    ]
  };

  const userComplaints = Object.keys(responses);
  let matchedResponse = "";
  userComplaints.forEach(complaint => {
    if (userText.includes(complaint)) {
      matchedResponse = responses[complaint][Math.floor(Math.random() * responses[complaint].length)];
    }
  });

  return matchedResponse !== "" ? matchedResponse : "Sepertinya saya tidak bisa membantu Anda dengan keluhan itu. Apakah ada hal lain yang bisa saya bantu?";
}

function correctTypos(text) {
  const keywords = ["kamu siapa", "nama", "profil", "info perpustakaan", "lokasi", "tempat", "dimana", "letak", "perpustakaan", "perpus", "buku yang bagus", "buku terbaik", "buku untuk bosan", "rekomendasi buku", "banny", "halo sayang", "masa", "emang iya", "yakin", "test", "hai", "halo", "kemampuan mu", "saya bosan", "membosankan", "lapar", "bingung", "kasar", "tidak layak"];
  const typoCorrections = keywords.map(keyword => [keyword, levenshteinDistance(keyword, text) < 3]);
  const closestMatch = typoCorrections.find(([keyword, isClose]) => isClose);
  return closestMatch ? closestMatch[0] : text;
}

function levenshteinDistance(a, b) {
  const matrix = [];
  for (let i = 0; i <= b.length; i++) {
    matrix[i] = [i];
  }
  for (let j = 0; j <= a.length; j++) {
    matrix[0][j] = j;
  }

  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      if (b.charAt(i - 1) === a.charAt(j - 1)) {
        matrix[i][j] = matrix[i - 1][j - 1];
      } else {
        matrix[i][j] = Math.min(
          matrix[i - 1][j - 1] + 1,
          Math.min(matrix[i][j - 1] + 1, matrix[i - 1][j] + 1)
        );
      }
    }
  }

  return matrix[b.length][a.length];
}

function generateBannyResponse() {
  const responses = [
    "Ya, saya Banny di sini.",
    "Banny siap membantu Anda!",
    "Banny di sini, apa yang bisa saya bantu?",
    "Saya Banny, ada yang bisa dibantu?"
  ];
  return responses[Math.floor(Math.random() * responses.length)];
}

function generateLovingResponse() {
  const responses = [
    "Hai juga sayang :)",
    "Halo, apa kabar sayang?",
    "Hai sayang, ada yang bisa Banny bantu?",
    "Halo sayang, bagaimana saya bisa membantu Anda hari ini?"
  ];
  return responses[Math.floor(Math.random() * responses.length)];
}

function generateConfirmationResponse() {
  const responses = [
    "Ya, benar sekali.",
    "Betul, saya pastikan informasi ini akurat.",
    "Tentu saja, Anda bisa mempercayai saya.",
    "Iya, memang begitu."
  ];
  return responses[Math.floor(Math.random() * responses.length)];
}

function generateGreetingResponse() {
  const responses = [
    "Halo! Bagaimana kabar Anda?",
    "Hai, ada yang bisa saya bantu?",
    "Halo, senang bisa berbicara dengan Anda!",
    "Hai, apa yang bisa saya bantu hari ini?",
    "Halo, bagaimana saya bisa membantu Anda?"
  ];
  return responses[Math.floor(Math.random() * responses.length)];
}

function isInappropriate(text) {
  const inappropriateWords = ["kasar", "tidak layak", "anjing", "tolol", "goblok", "ngotak", "ngentot", "kontol", "memek", "cibai", "puki", "ngewe", "bokep", "porno"]; // List kata-kata tidak layak dapat ditambahkan di sini
  return inappropriateWords.some(word => text.includes(word));
}

function handleInappropriateMessage() {
  const responses = [
    "Saya kecewa dengan bahasa Anda. Mohon lebih sopan.",
    "Bahasa Anda tidak layak. Silakan coba lagi dengan sopan.",
    "Mari kita jaga kesopanan dalam percakapan ini.",
    "Saya tidak bisa menanggapi bahasa yang tidak pantas. Silakan gunakan bahasa yang sopan."
  ];
  return responses[Math.floor(Math.random() * responses.length)];
}

function generateRandomResponse() {
  const responses = [
    "Saya tidak mengerti pertanyaan Anda. Bisa dijelaskan lebih lanjut?",
    "Maaf, bisa ulangi pertanyaan Anda?",
    "Saya tidak yakin tentang itu. Bisa Anda tanyakan lagi?",
    "Hmm, saya tidak mengerti. Apa ada hal lain yang bisa saya bantu?",
    "Bisa lebih spesifik? Saya akan mencoba membantu Anda.",
    "Saya tidak yakin tentang hal itu, mungkin Anda bisa bertanya dengan cara lain?"
  ];
  return responses[Math.floor(Math.random() * responses.length)];
}

function resetChat() {
  const chatBox = document.getElementById("chat-box");
  chatBox.innerHTML = "";
  addBotMessage("Apa yang bisa saya bantu?");
}

function speakText(text) {
  const utterance = new SpeechSynthesisUtterance(text);
  speechSynthesis.speak(utterance);
}
