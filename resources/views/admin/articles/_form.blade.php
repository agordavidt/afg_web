<div class="row">

    {{-- Left: main content --}}
    <div class="col-md-8">

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" id="articleTitle"
                   class="form-control form-control-lg @error('title') is-invalid @enderror"
                   value="{{ old('title', $article->title ?? '') }}"
                   placeholder="Article title" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Excerpt --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">
                Excerpt
                <span class="text-muted fw-normal">— shown on listing pages (max 500 chars)</span>
            </label>
            <textarea name="excerpt" rows="3" maxlength="500"
                      class="form-control @error('excerpt') is-invalid @enderror"
                      placeholder="A short summary of what this article covers."
                      required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
            @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Rich text body --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Body</label>

            {{-- Editable area — Quill mounts here and builds its own toolbar above --}}
            <div id="editor" class="@error('body') is-invalid @enderror" style="background:#fff;">{!! old('body', $article->body ?? '') !!}</div>

            {{-- Hidden input carries the HTML to the server --}}
            <input type="hidden" name="body" id="bodyInput" value="{{ old('body', $article->body ?? '') }}">
            @error('body')<div class="text-danger mt-1" style="font-size:0.875em;">{{ $message }}</div>@enderror
        </div>

    </div>

    {{-- Right: meta --}}
    <div class="col-md-4">

        {{-- Publish card --}}
        <div class="card mb-3">
            <div class="card-header fw-semibold">Publish</div>
            <div class="card-body">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1"
                           {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">
                        Published <span class="text-muted">(visible on site)</span>
                    </label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" form="articleForm" class="btn btn-primary btn-sm">Save</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary btn-sm">Cancel</a>
                </div>

                @isset($article)
                <hr>
                <p class="text-muted mb-1" style="font-size:0.78rem;">FRONTEND URL</p>
                <a href="{{ route('articles.show', $article->slug) }}" target="_blank" style="font-size:0.82rem;">
                    View on site ↗
                </a>
                @endisset
            </div>
        </div>

        {{-- Category + reading time --}}
        <div class="card mb-3">
            <div class="card-header fw-semibold">Details</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option value="">Select category</option>
                        @foreach(['remote' => 'Remote work', 'scholarship' => 'Scholarships', 'platforms' => 'Platforms & tools', 'career' => 'Career'] as $val => $label)
                            <option value="{{ $val }}" {{ old('category', $article->category ?? '') === $val ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-0">
                    <label class="form-label">Reading time (minutes)</label>
                    <input type="number" name="reading_time_minutes" min="1" max="60"
                           class="form-control @error('reading_time_minutes') is-invalid @enderror"
                           value="{{ old('reading_time_minutes', $article->reading_time_minutes ?? 5) }}" required>
                    @error('reading_time_minutes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

            </div>
        </div>

        {{-- Featured image --}}
        <div class="card">
            <div class="card-header fw-semibold">Featured image</div>
            <div class="card-body">
                <div class="mb-2">
                    <label class="form-label">Image URL <span class="text-muted fw-normal">(optional)</span></label>
                    <input type="url" name="featured_image_url" id="featuredImageUrl"
                           class="form-control form-control-sm @error('featured_image_url') is-invalid @enderror"
                           value="{{ old('featured_image_url', $article->featured_image_url ?? '') }}"
                           placeholder="https://...">
                    @error('featured_image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div id="imgPreview" style="display:none; margin-top:0.5rem;">
                    <img id="imgPreviewEl" src="" alt="Preview"
                         style="width:100%; border-radius:4px; border:1px solid #dee2e6;">
                </div>
            </div>
        </div>

    </div>
</div>