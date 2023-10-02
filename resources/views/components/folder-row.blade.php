<div class="row box-row">
    <div class="col-3 name-file">
        <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
        <ul class="dropdown-menu">
            <li class="rename-{{$actionClass}}" dataid="{{ $dataId }}" data-edit="{{ $dataEdit}}" data-update={{ $dataUpdate }}><i class="bi bi-pencil-square text-primary me-2 ms-2"></i>Rename</li>
            <li><hr class="dropdown-divider"></li>
            <li class="delete-{{$actionClass}}"  dataid="{{ $dataId }}" data-delete={{ $dataDelete }}><i class="bi bi-trash3 text-danger me-2 ms-2"></i>Delete</li>
        </ul>
        <a class="fw-normal link-dark text-decoration-none" href="{{ $dataLink }}"><i class="bi bi-folder-fill text-info"></i> {{ $name }}</a>
    </div>
    <div class="col-3 size">{{ $size }}</div>
    <div class="col-3 author">{{ $author }}</div>
    <div class="col-3 last-date">{{ $lastDate }}</div>
</div>
