<div class="modal fade" id="image_Modal<?php echo $i; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg modal-middle">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body col-10 mx-auto">
                <img class="d-block mx-auto" src="{{ Storage::url($image->file_path) }}" width="80%" />
                <p class="m-0 text-center">{{ $image->file_name }}</p>
                <hr>
                <ul class="setting-list p-2">
                    <li>
                        <a class="btn submit-btn float-end" data-bs-toggle="collapse" href="#collapseImageUpdate"
                            role="button" aria-expanded="false" aria-controls="collapseImageUpdate">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>画像を変更する</h4>
                        <div class="collapse" id="collapseImageUpdate">
                            <form method='POST' action="/imageUpdate" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name='file_path' value="{{ $image->file_path }}">
                                <input type="hidden" name='diary_date' value="{{ $date }}">
                                <input type="hidden" name='id' value="{{ $image->id }}">
                                <div class="form-group col-10 mx-auto">
                                    <input type="file" class="form-control m-2" name="diary_img"
                                        accept="image/png, image/jpeg">
                                </div>
                                <input type='submit' class="btn submit-btn" value="画像を変更">
                            </form>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <a class="btn submit-btn float-end" data-bs-toggle="collapse" href="#collapseImageDelete"
                            role="button" aria-expanded="false" aria-controls="collapseImageDelete">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>画像を削除する</h4>
                        <div class="collapse" id="collapseImageDelete">
                            <form method='POST' action="/imageDelete">
                                @csrf
                                <input type="hidden" name='id' value="{{ $image->id }}">
                                <input type="hidden" name='file_path' value="{{ $image->file_path }}">
                                <input type="hidden" name='diary_date' value="{{ $date }}">
                                <button type="submit" class="btn submit-btn ms-1"><i
                                        class="me-1 fa-solid fa-trash-can"></i>画像を削除</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
