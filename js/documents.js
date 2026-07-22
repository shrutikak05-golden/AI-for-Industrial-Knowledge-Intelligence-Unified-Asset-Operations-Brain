/* ==========================================================
   Strata — documents page logic
   `documents` array below is dummy data. Swap the render/upload/
   delete functions for real API calls when the backend is ready.
   ========================================================== */

let documents = [
  { id: "DOC-104", name: "Turbine Maintenance Manual Rev.4.pdf", type: "pdf", size: "8.4 MB", uploaded: "2 days ago", status: "Indexed", tags: ["Manual"] },
  { id: "DOC-098", name: "Lockout-Tagout SOP v2.docx", type: "doc", size: "1.1 MB", uploaded: "3 days ago", status: "Indexed", tags: ["SOP"] },
  { id: "DOC-091", name: "Q1 Boiler Pressure Report.pdf", type: "pdf", size: "3.2 MB", uploaded: "5 days ago", status: "Indexed", tags: ["Report"] },
  { id: "DOC-087", name: "Conveyor Belt Inspection Photos.zip", type: "img", size: "22.6 MB", uploaded: "1 week ago", status: "Indexed", tags: ["Report"] },
  { id: "DOC-076", name: "Hydraulic Press Wiring Diagram.pdf", type: "pdf", size: "5.7 MB", uploaded: "1 week ago", status: "Processing", tags: ["Manual"] },
  { id: "DOC-071", name: "Emergency Shutdown SOP.docx", type: "doc", size: "0.8 MB", uploaded: "2 weeks ago", status: "Indexed", tags: ["SOP"] },
  { id: "DOC-063", name: "Compressor Vibration Dataset.xlsx", type: "sheet", size: "4.9 MB", uploaded: "2 weeks ago", status: "Indexed", tags: ["Data"] },
  { id: "DOC-058", name: "Annual Plant Safety Audit.pdf", type: "pdf", size: "12.3 MB", uploaded: "3 weeks ago", status: "Indexed", tags: ["Report"] },
];

let activeFilter = "All";
let pendingDeleteId = null;

const ICONS = {
  pdf: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6"/></svg>',
  doc: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6"/></svg>',
  sheet: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M3 15h18M9 3v18"/></svg>',
  img: '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>',
};

const STATUS_BADGE = {
  Indexed: 'badge-green',
  Processing: 'badge-amber',
  Failed: 'badge-red',
};

function renderDocuments() {
  const tbody = document.getElementById('doc-table-body');
  const list = activeFilter === 'All' ? documents : documents.filter((d) => d.tags.includes(activeFilter));

  if (list.length === 0) {
    tbody.innerHTML = `<tr><td colspan="5" style="text-align:center;padding:40px 0;color:var(--text-faint);">No documents match this filter.</td></tr>`;
  } else {
    tbody.innerHTML = list.map((d) => `
      <tr>
        <td>
          <div class="doc-name-cell">
            <div class="doc-icon">${ICONS[d.type]}</div>
            <div>
              <div class="doc-name">${d.name}</div>
              <div class="doc-id">${d.id}</div>
            </div>
          </div>
        </td>
        <td class="mono" style="color:var(--text-muted);font-size:12.5px;">${d.size}</td>
        <td class="mono" style="color:var(--text-muted);font-size:12.5px;">${d.uploaded}</td>
        <td>
          <span class="badge ${STATUS_BADGE[d.status]}">${d.status === 'Processing' ? '⏳ ' : ''}${d.status}</span>
        </td>
        <td>
          <div class="row-actions">
            <button aria-label="View" title="View"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
            <button aria-label="Download" title="Download"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg></button>
            <button class="danger" aria-label="Delete" title="Delete" onclick="requestDelete('${d.id}')"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0l-1 14a2 2 0 01-2 2H7a2 2 0 01-2-2L4 6"/></svg></button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  document.getElementById('doc-count').textContent = `${documents.length} files · 4.2 GB used`;
}

function requestDelete(id) {
  pendingDeleteId = id;
  const doc = documents.find((d) => d.id === id);
  document.getElementById('delete-doc-name').textContent = doc ? doc.name : '';
  openModal('delete-modal');
}

document.getElementById('confirm-delete-btn').addEventListener('click', () => {
  const doc = documents.find((d) => d.id === pendingDeleteId);
  documents = documents.filter((d) => d.id !== pendingDeleteId);
  closeModal('delete-modal');
  renderDocuments();
  if (doc) showToast(`${doc.name} deleted`, 'error');
});

/* ---------- filters ---------- */
document.getElementById('filter-row').addEventListener('click', (e) => {
  const btn = e.target.closest('.filter-chip');
  if (!btn) return;
  document.querySelectorAll('.filter-chip').forEach((c) => c.classList.remove('active'));
  btn.classList.add('active');
  activeFilter = btn.dataset.filter;
  renderDocuments();
});

/* ---------- simulated upload ---------- */
function simulateUpload() {
  const id = `DOC-${Math.floor(Math.random() * 900 + 100)}`;
  const newDoc = { id, name: "New Upload — Pump Station SOP.pdf", type: "pdf", size: "2.1 MB", uploaded: "just now", status: "Processing", tags: ["SOP"] };
  documents.unshift(newDoc);
  renderDocuments();
  showToast('Upload started — indexing in progress');

  setTimeout(() => {
    const doc = documents.find((d) => d.id === id);
    if (doc) {
      doc.status = 'Indexed';
      renderDocuments();
      showToast('Pump Station SOP.pdf finished indexing');
    }
  }, 2200);
}

document.getElementById('upload-btn').addEventListener('click', simulateUpload);

const dropzone = document.getElementById('dropzone');
dropzone.addEventListener('click', simulateUpload);
dropzone.addEventListener('dragover', (e) => { e.preventDefault(); dropzone.classList.add('drag-over'); });
dropzone.addEventListener('dragleave', () => dropzone.classList.remove('drag-over'));
dropzone.addEventListener('drop', (e) => { e.preventDefault(); dropzone.classList.remove('drag-over'); simulateUpload(); });

renderDocuments();
