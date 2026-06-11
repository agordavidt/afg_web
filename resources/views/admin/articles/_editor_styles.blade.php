<style>
/* ── TIPTAP TOOLBAR ── */
.tiptap-toolbar {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 2px;
    padding: 6px 8px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-bottom: none;
    border-radius: 4px 4px 0 0;
}

.tiptap-toolbar button {
    padding: 4px 9px;
    font-size: 0.82rem;
    font-family: inherit;
    font-weight: 500;
    background: transparent;
    border: 1px solid transparent;
    border-radius: 3px;
    cursor: pointer;
    color: #495057;
    line-height: 1.4;
    transition: background 0.15s, border-color 0.15s;
}

.tiptap-toolbar button:hover {
    background: #e9ecef;
    border-color: #ced4da;
}

.tiptap-toolbar button.is-active {
    background: #dee2e6;
    border-color: #adb5bd;
    color: #212529;
}

.tiptap-sep {
    width: 1px;
    height: 20px;
    background: #dee2e6;
    margin: 0 4px;
}

/* ── EDITOR CANVAS ── */
.tiptap-editor {
    min-height: 420px;
    padding: 20px 24px;
    border: 1px solid #dee2e6;
    border-radius: 0 0 4px 4px;
    background: #fff;
    outline: none;
    font-size: 0.95rem;
    line-height: 1.75;
    color: #212529;
    cursor: text;
}

.tiptap-editor:focus-within {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13,110,253,.1);
}

/* ── EDITOR CONTENT STYLES ── */
.tiptap-editor h2 {
    font-size: 1.35rem;
    font-weight: 700;
    margin: 1.8rem 0 0.8rem;
    padding-bottom: 0.4rem;
    border-bottom: 2px solid #f1f3f5;
    color: #111;
}

.tiptap-editor h3 {
    font-size: 1.1rem;
    font-weight: 700;
    margin: 1.4rem 0 0.6rem;
    color: #111;
}

.tiptap-editor p {
    margin: 0 0 1rem;
}

.tiptap-editor ul,
.tiptap-editor ol {
    padding-left: 1.5rem;
    margin: 0 0 1rem;
}

.tiptap-editor li {
    margin-bottom: 0.35rem;
}

.tiptap-editor blockquote {
    border-left: 3px solid #F5F024;
    padding: 10px 16px;
    margin: 1.2rem 0;
    background: #fffde7;
    border-radius: 0 4px 4px 0;
    color: #495057;
}

.tiptap-editor blockquote p { margin: 0; }

.tiptap-editor a {
    color: #0d6efd;
    text-decoration: underline;
}

.tiptap-editor mark {
    background: #fff3cd;
    padding: 1px 3px;
    border-radius: 2px;
}

.tiptap-editor hr {
    border: none;
    border-top: 1px solid #dee2e6;
    margin: 1.6rem 0;
}

.tiptap-editor strong { font-weight: 700; }
.tiptap-editor em     { font-style: italic; }

/* Placeholder */
.tiptap-editor .is-empty::before {
    content: attr(data-placeholder);
    color: #adb5bd;
    pointer-events: none;
    position: absolute;
}

.tiptap-editor .ProseMirror { outline: none; }
.tiptap-editor .ProseMirror p.is-editor-empty:first-child::before {
    content: attr(data-placeholder);
    color: #adb5bd;
    pointer-events: none;
    float: left;
    height: 0;
}
</style>