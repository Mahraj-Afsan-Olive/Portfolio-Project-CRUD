@csrf
<div class="form-group">
    <label>Title*</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $project->title ?? '') }}" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $project->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Project URL</label>
    <input type="text" name="project_url" class="form-control" value="{{ old('project_url', $project->project_url ?? '') }}">
</div>
<div class="form-group">
    <label>Image {{ isset($project) ? '' : '*' }}</label>
    <input type="file" name="image" class="form-control">
    @if(isset($project))<img src="{{ asset('storage/'.$project->image) }}" width="100">@endif
</div>
<div class="form-group">
    <label>Status*</label>
    <select name="status" class="form-control" required>
        <option value="draft" {{ (old('status', $project->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ (old('status', $project->status ?? '') == 'published') ? 'selected' : '' }}>Published</option>
    </select>
</div>
