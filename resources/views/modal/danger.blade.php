<div class="modal fade" id="staticBackdropDanger" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">警告</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                本当に削除しますか？
                <br>
                <span class="attention">※1度削除を行うと復元できません・写真も同時に削除されます</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <form method='POST' action="/delete" id='delete-form'>
                    @csrf
                    <input type="hidden" name='diary_date' value="{{ $date }}">
                    <button type="submit" class="btn submit-btn">削除する</button>
                </form>
            </div>
        </div>
    </div>
</div>
