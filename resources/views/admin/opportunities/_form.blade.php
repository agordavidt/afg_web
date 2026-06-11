<div class="card">
    <div class="card-body">

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $opportunity->title ?? '') }}"
                   placeholder="e.g. DAAD Scholarships 2026 — Postgraduate, Germany" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Type --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Type</label>
            <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                <option value="">Select type</option>
                @foreach(['remote' => 'Remote work', 'scholarship' => 'Scholarship', 'grant' => 'Grant', 'training' => 'Training'] as $val => $label)
                    <option value="{{ $val }}" {{ old('type', $opportunity->type ?? '') === $val ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Summary --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Summary</label>
            <textarea name="summary" rows="4"
                      class="form-control @error('summary') is-invalid @enderror"
                      placeholder="2–3 sentences describing the opportunity, eligibility, and key details."
                      required>{{ old('summary', $opportunity->summary ?? '') }}</textarea>
            @error('summary')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Source --}}
        <div class="row">
            <div class="col-md-5 mb-3">
                <label class="form-label fw-semibold">Source name</label>
                <input type="text" name="source_name"
                       class="form-control @error('source_name') is-invalid @enderror"
                       value="{{ old('source_name', $opportunity->source_name ?? '') }}"
                       placeholder="e.g. DAAD" required>
                @error('source_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-7 mb-3">
                <label class="form-label fw-semibold">Source URL <span class="text-muted fw-normal">(full link to apply)</span></label>
                <input type="url" name="source_url"
                       class="form-control @error('source_url') is-invalid @enderror"
                       value="{{ old('source_url', $opportunity->source_url ?? '') }}"
                       placeholder="https://..." required>
                @error('source_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Deadline + Active --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Deadline
                    <span class="text-muted fw-normal">(leave blank for rolling)</span>
                </label>
                <input type="date" name="deadline"
                       class="form-control @error('deadline') is-invalid @enderror"
                       value="{{ old('deadline', isset($opportunity->deadline) ? $opportunity->deadline->format('Y-m-d') : '') }}">
                @error('deadline')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3 d-flex align-items-end">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1"
                           {{ old('is_active', $opportunity->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Active <span class="text-muted">(visible on site)</span>
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>