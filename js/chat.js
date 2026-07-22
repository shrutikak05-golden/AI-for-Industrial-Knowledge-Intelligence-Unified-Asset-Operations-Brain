/* ==========================================================
   Strata — chat page logic
   Replace `getDummyReply()` with a real fetch() call to your
   backend/AI endpoint to go live.
   ========================================================== */

const messagesEl = document.getElementById('chat-messages');
const inputEl = document.getElementById('chat-input');
const sendBtn = document.getElementById('send-btn');
const newChatBtn = document.getElementById('new-chat-btn');

const DUMMY_REPLIES = [
  {
    text: "Based on the Lockout-Tagout SOP, the technician must isolate all energy sources, apply a personal lock and tag, and verify zero-energy state with a test-before-touch check before beginning service.",
    cites: ["DOC-098 · §2.3 · 94% match", "DOC-071 · §1.1 · 82% match"]
  },
  {
    text: "The Q1 boiler pressure report shows all units operating within the 145–160 psi normal band, with one brief excursion to 168 psi on Unit 3 that self-corrected within 90 seconds.",
    cites: ["DOC-091 · p.12 · 89% match"]
  },
  {
    text: "Conveyor belt inspections are scheduled monthly. The most recent report flagged minor fraying on Line 2's return idler, recommended for replacement within 30 days.",
    cites: ["DOC-087 · Inspection Log 4 · 85% match"]
  }
];

function scrollToBottom() {
  messagesEl.scrollTop = messagesEl.scrollHeight;
}

function appendMessage(role, html) {
  const wrap = document.createElement('div');
  wrap.className = `message ${role} fade-in`;

  if (role === 'assistant') {
    wrap.innerHTML = `
      <div class="message-avatar">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
      </div>
      <div class="message-bubble">${html}</div>`;
  } else {
    wrap.innerHTML = `<div class="message-bubble">${html}</div>`;
  }
  messagesEl.appendChild(wrap);
  scrollToBottom();
  return wrap;
}

function showTyping() {
  const wrap = document.createElement('div');
  wrap.className = 'message assistant fade-in';
  wrap.id = 'typing-indicator';
  wrap.innerHTML = `
    <div class="message-avatar">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
    </div>
    <div class="message-bubble"><div class="typing-dots"><span></span><span></span><span></span></div></div>`;
  messagesEl.appendChild(wrap);
  scrollToBottom();
}

function removeTyping() {
  document.getElementById('typing-indicator')?.remove();
}

function getDummyReply() {
  return DUMMY_REPLIES[Math.floor(Math.random() * DUMMY_REPLIES.length)];
}

function sendMessage() {
  const text = inputEl.value.trim();
  if (!text) return;

  appendMessage('user', escapeHtml(text));
  inputEl.value = '';
  inputEl.style.height = 'auto';

  showTyping();

  // --- Replace this timeout + getDummyReply() with a real API call ---
  setTimeout(() => {
    removeTyping();
    const reply = getDummyReply();
    const citeHtml = reply.cites.map((c) => `<span class="cite-tag">${c}</span>`).join('');
    appendMessage('assistant', `${reply.text}<div class="cite-row">${citeHtml}</div>`);
  }, 1300);
}

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

sendBtn.addEventListener('click', sendMessage);
inputEl.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && !e.shiftKey) {
    e.preventDefault();
    sendMessage();
  }
});
inputEl.addEventListener('input', () => {
  inputEl.style.height = 'auto';
  inputEl.style.height = Math.min(inputEl.scrollHeight, 120) + 'px';
});

newChatBtn.addEventListener('click', () => {
  messagesEl.innerHTML = `
    <div class="message assistant fade-in">
      <div class="message-avatar">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l1.5 4.5L18 8l-4.5 1.5L12 14l-1.5-4.5L6 8l4.5-1.5z"/></svg>
      </div>
      <div class="message-bubble">New conversation started. Ask me anything about your indexed documents.</div>
    </div>`;
});
