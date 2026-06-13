<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">

<style>
/* ── QUILL TOOLBAR ── */
.ql-toolbar.ql-snow {
    border: 1px solid #dee2e6;
    border-bottom: none;
    border-radius: 4px 4px 0 0;
    background: #f8f9fa;
    font-family: inherit;
}

.ql-container.ql-snow {
    border: 1px solid #dee2e6;
    border-radius: 0 0 4px 4px;
    background: #fff;
    font-family: inherit;
    font-size: 0.95rem;
}

.ql-container.ql-snow.ql-error {
    border-color: #dc3545;
}

#editor .ql-editor {
    min-height: 420px;
    line-height: 1.75;
    color: #212529;
    padding: 20px 24px;
}

/* ── EDITOR CONTENT STYLES ── */
#editor .ql-editor h2 {
    font-size: 1.35rem;
    font-weight: 700;
    margin: 1.8rem 0 0.8rem;
    padding-bottom: 0.4rem;
    border-bottom: 2px solid #f1f3f5;
    color: #111;
}

#editor .ql-editor h3 {
    font-size: 1.1rem;
    font-weight: 700;
    margin: 1.4rem 0 0.6rem;
    color: #111;
}

#editor .ql-editor p { margin: 0 0 1rem; }

#editor .ql-editor ul,
#editor .ql-editor ol {
    padding-left: 1.5rem;
    margin: 0 0 1rem;
}

#editor .ql-editor li { margin-bottom: 0.35rem; }

#editor .ql-editor blockquote {
    border-left: 3px solid #F5F024;
    padding: 10px 16px;
    margin: 1.2rem 0;
    background: #fffde7;
    border-radius: 0 4px 4px 0;
    color: #495057;
}

#editor .ql-editor a {
    color: #0d6efd;
    text-decoration: underline;
}

#editor .ql-editor strong { font-weight: 700; }
#editor .ql-editor em     { font-style: italic; }
</style>