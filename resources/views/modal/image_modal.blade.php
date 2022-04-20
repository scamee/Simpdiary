<div class="modal fade" id="image_Modal<?php echo $i; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg modal-middle">
        <div class="modal-content">
            <div class="modal-body form-container mx-auto" style="border:none;margin-top:0!important;">
                <img class="d-block mx-auto" src="{{ Storage::url($image->file_path) }}" width="100%" />
                <p class="m-0 text-center">{{ $image->file_name }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
