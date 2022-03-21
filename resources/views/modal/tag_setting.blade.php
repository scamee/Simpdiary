<div class="modal fade" id="TagSettingModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h4 class="modal-title" id="Title">タグ設定</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <ul class="setting-list p-2">
                    <li>
                        <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseTag1"
                            role="button" aria-expanded="false" aria-controls="collapseTag1">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>

                        <p>タイトル:
                            <span class="border-bottom border-primary border-2">{{ $tag1->title }}</span>
                        </p>
                        <p>日付:
                            <span class="border-bottom border-primary border-2">{{ $tag1->set_day }}</span>
                        </p>
                        <div class="collapse" id="collapseTag1">
                            <form method='POST' action="/tagupdate">
                                @csrf
                                <input type="hidden" name="id" value="{{ $tag1->id }}">
                                <label class="form-label" for="tag1-title">タイトル [10文字以内]</label>
                                <input type="text" class="form-control" id="tag1-title" name="tag-title"
                                    value="{{ $tag1->title }}">
                                <label class="form-label" for="tag1-setday">日付 [yyyy-mm-dd]</label>
                                <input type="text" class="form-control" id="tag1-setday" name="tag-setday"
                                    value="{{ $tag1->set_day }}">
                                <button type="submit" class="btn btn-outline-primary">保存</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseTag2"
                            role="button" aria-expanded="false" aria-controls="collapseTag2">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <p>タイトル:
                            <span class="border-bottom border-primary border-2">{{ $tag2->title }}</span>
                        </p>
                        <p>日付:
                            <span class="border-bottom border-primary border-2">{{ $tag2->set_day }}</span>
                        </p>
                        <div class="collapse" id="collapseTag2">
                            <form method='POST' action="/tagupdate">
                                @csrf
                                <input type="hidden" name="id" value="{{ $tag2->id }}">
                                <label class="form-label" for="tag2-title">タイトル [10文字以内]</label>
                                <input type="text" class="form-control" id="tag2-title" name="tag-title"
                                    value="{{ $tag2->title }}">
                                <label class="form-label" for="tag2-setday">日付 [yyyy-mm-dd]</label>
                                <input type="text" class="form-control" id="tag2-setday" name="tag-setday"
                                    value="{{ $tag2->set_day }}">
                                <button type="submit" class="btn btn-outline-primary">保存</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
