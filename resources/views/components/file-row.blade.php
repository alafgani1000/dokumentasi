<div class="row box-row">
    <div class="col-3 name-file">
        <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
        <ul class="dropdown-menu">
            <li class="rename-{{$action_class}}" dataid={{$data_id}}><i class="bi bi-pencil-square text-primary me-2"></i>Rename</li>
            <li><hr class="dropdown-divider"></li>
            <li><i class="bi bi-share text-success me-2"></i>Share</li>
            <li><hr class="dropdown-divider"></li>
            <li><i class="bi bi-trash3 text-danger me-2"></i>Delete></li>
        </ul>
        <i class="bi {{ $icon }} text-primary"></i>{{ $name }}</div>
    <div class="col-3 size">{{ $size }}</div>
    <div class="col-3 author">{{ $author }}</div>
    <div class="col-3 last-date">{{ $update_date }}</div>
</div>
