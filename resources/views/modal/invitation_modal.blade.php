<div class="modal fade" id="InvitationModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h4 class="modal-title" id="Title">パートナーと日記を共有</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <ul class="setting-list p-2">
                    <div class="setting-list-info m-2">
                        <p>当アプリには、日記を別アカウントと共有できる機能があります</p>
                        <p>指定したメールアドレスに日記を共有するリンクを送信できます</p>
                        <p>共有すると、お互いに全ての日記が閲覧できます</p>
                    </div>
                    <hr>
                    <form action="/mail" method="post">
                        @csrf
                        <input type='hidden' name='diary_date' value="{{ $date }}">
                        <label class="form-label" for="invitation_email">相手のメールアドレスを入力してください</label>
                        <input class="form-control" type="email" id="invitation_email" name="email"
                            placeholder="メールアドレス">
                        <input class="btn submit-btn modal-btn" type="submit" value="共有リンクを送信">
                    </form>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
