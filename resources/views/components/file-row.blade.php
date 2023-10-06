<div class="row box-row">
    <div class="col-3 name-file">
        <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
        <ul class="dropdown-menu box-button">
            <li><hr class="dropdown-divider"></li>
            <li class="share-{{$actionClass}}" dataid={{$dataId}} data-share={{ $dataShare }}><i class="bi bi-share text-success ms-2 me-2"></i>Share</li>
            <li><hr class="dropdown-divider"></li>
            <li class="delete-{{$actionClass}}" dataid={{$dataId}} data-delete={{ $dataDelete }}><i class="bi bi-trash3 text-danger ms-2 me-2"></i>Delete</li>
        </ul>
        <i class="bi {{ $icon }} text-primary"></i>  <a target="_blank" href="{{ $linkRead }}" title="{{ $name }}">{{ Str::substr($name, 0, 20) }}...pdf</a>
    </div>
    <div class="col-3 size">{{ $size }}</div>
    <div class="col-3 author">{{ $author }}</div>
    <div class="col-3 last-date">{{ $createDate }}</div>
</div>
