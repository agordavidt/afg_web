<script src="https://cdn.jsdelivr.net/npm/@tiptap/core@2.4.0/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tiptap/pm@2.4.0/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tiptap/starter-kit@2.4.0/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tiptap/extension-link@2.4.0/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tiptap/extension-highlight@2.4.0/dist/index.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tiptap/extension-placeholder@2.4.0/dist/index.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Existing content (edit mode) ──────────────────────────────────────
    const existing = document.getElementById('bodyInput').value || '';

    // ── Init TipTap ──────────────────────────────────────────────────────
    const editor = new TiptapCore.Editor({
        element: document.getElementById('editor'),
        extensions: [
            TiptapStarterKit.StarterKit,
            TiptapExtensionLink.Link.configure({
                openOnClick: false,
                HTMLAttributes: { rel: 'noopener noreferrer' },
            }),
            TiptapExtensionHighlight.Highlight,
            TiptapExtensionPlaceholder.Placeholder.configure({
                placeholder: 'Start writing your article here…',
            }),
        ],
        content: existing,
        onUpdate({ editor }) {
            document.getElementById('bodyInput').value = editor.getHTML();
        },
    });

    // ── Toolbar ──────────────────────────────────────────────────────────
    const toolbar = document.getElementById('editorToolbar');

    toolbar.querySelectorAll('button[data-cmd]').forEach(btn => {
        btn.addEventListener('mousedown', e => {
            e.preventDefault(); // keep editor focus
            const cmd = btn.dataset.cmd;

            switch (cmd) {
                case 'bold':       editor.chain().focus().toggleBold().run();           break;
                case 'italic':     editor.chain().focus().toggleItalic().run();         break;
                case 'h2':         editor.chain().focus().toggleHeading({ level: 2 }).run(); break;
                case 'h3':         editor.chain().focus().toggleHeading({ level: 3 }).run(); break;
                case 'bullet':     editor.chain().focus().toggleBulletList().run();     break;
                case 'ordered':    editor.chain().focus().toggleOrderedList().run();    break;
                case 'blockquote': editor.chain().focus().toggleBlockquote().run();     break;
                case 'highlight':  editor.chain().focus().toggleHighlight().run();      break;
                case 'hr':         editor.chain().focus().setHorizontalRule().run();    break;
                case 'undo':       editor.chain().focus().undo().run();                 break;
                case 'redo':       editor.chain().focus().redo().run();                 break;

                case 'link': {
                    const prev = editor.getAttributes('link').href || '';
                    const url  = window.prompt('Enter URL:', prev);
                    if (url === null) break;
                    if (url === '') {
                        editor.chain().focus().unsetLink().run();
                    } else {
                        editor.chain().focus().setLink({ href: url }).run();
                    }
                    break;
                }

                case 'unlink':
                    editor.chain().focus().unsetLink().run();
                    break;
            }

            updateToolbarState();
        });
    });

    // ── Toolbar active states ────────────────────────────────────────────
    function updateToolbarState() {
        const map = {
            bold:       () => editor.isActive('bold'),
            italic:     () => editor.isActive('italic'),
            h2:         () => editor.isActive('heading', { level: 2 }),
            h3:         () => editor.isActive('heading', { level: 3 }),
            bullet:     () => editor.isActive('bulletList'),
            ordered:    () => editor.isActive('orderedList'),
            blockquote: () => editor.isActive('blockquote'),
            highlight:  () => editor.isActive('highlight'),
            link:       () => editor.isActive('link'),
        };

        toolbar.querySelectorAll('button[data-cmd]').forEach(btn => {
            const check = map[btn.dataset.cmd];
            btn.classList.toggle('is-active', check ? check() : false);
        });
    }

    editor.on('selectionUpdate', updateToolbarState);
    editor.on('transaction',     updateToolbarState);

    // ── Sync hidden input on form submit ─────────────────────────────────
    document.getElementById('articleForm').addEventListener('submit', () => {
        document.getElementById('bodyInput').value = editor.getHTML();
    });

    // ── Featured image preview ───────────────────────────────────────────
    const urlInput = document.getElementById('featuredImageUrl');
    const preview  = document.getElementById('imgPreview');
    const previewEl= document.getElementById('imgPreviewEl');

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
    refreshPreview(); // show on edit page if URL already set
});
</script>