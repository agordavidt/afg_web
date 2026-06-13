<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const bodyInput = document.getElementById('bodyInput');
    const existing  = bodyInput.value || '';

    // ── Remove the old toolbar markup (Quill builds its own) ──────────────
    const oldToolbar = document.getElementById('editorToolbar');
    if (oldToolbar) oldToolbar.remove();

    // ── Init Quill ──────────────────────────────────────────────────────
    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Start writing your article here…',
        modules: {
            toolbar: [
                [{ header: [2, 3, false] }],
                ['bold', 'italic'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['blockquote', 'link'],
                [{ background: ['#fff3cd', false] }], // highlight
                ['clean'],
            ],
        },
    });

    // ── Load existing content (edit mode) ─────────────────────────────────
    if (existing.trim()) {
        quill.clipboard.dangerouslyPasteHTML(existing);
    }

    // ── Keep hidden input in sync ──────────────────────────────────────────
    function sync() {
        const html = quill.root.innerHTML.trim();
        bodyInput.value = (html === '<p><br></p>') ? '' : html;
    }

    quill.on('text-change', sync);
    sync(); // initial sync so edit pages aren't empty on load

    // ── Validate on submit ─────────────────────────────────────────────────
    const form      = document.getElementById('articleForm');
    const container = document.querySelector('.ql-container');

    form.addEventListener('submit', function (e) {
        sync();
        if (!bodyInput.value) {
            e.preventDefault();
            container.classList.add('ql-error');
            container.scrollIntoView({ behavior: 'smooth', block: 'center' });

            let msg = document.getElementById('bodyError');
            if (!msg) {
                msg = document.createElement('div');
                msg.id = 'bodyError';
                msg.className = 'text-danger mt-1';
                msg.style.fontSize = '0.875em';
                msg.textContent = 'The body field is required.';
                container.insertAdjacentElement('afterend', msg);
            }
        } else {
            container.classList.remove('ql-error');
            const msg = document.getElementById('bodyError');
            if (msg) msg.remove();
        }
    });

    // ── Featured image preview ───────────────────────────────────────────
    const urlInput  = document.getElementById('featuredImageUrl');
    const preview   = document.getElementById('imgPreview');
    const previewEl = document.getElementById('imgPreviewEl');

    function refreshPreview() {
        const val = urlInput.value.trim();
        if (val) {
            previewEl.src = val;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }

    urlInput.addEventListener('input', refreshPreview);
    refreshPreview();
});
</script>