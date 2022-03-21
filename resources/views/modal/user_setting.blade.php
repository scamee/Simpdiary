<div class="modal fade" id="UserSettingModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h4 class="modal-title" id="Title">アカウント設定</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <ul class="setting-list p-2">
                    <li>
                        <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseExample"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>ユーザー名</h4>
                        <p>あなたのユーザー名:
                            <span class="border-bottom border-primary border-2">{{ $user->name }}</span>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <form action="#">
                                @csrf
                                <label class="form-label" for="username">新しいユーザー名</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $user->name }}">
                                <button type="submit" class="btn btn-outline-primary">保存</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseExample2"
                            role="button" aria-expanded="false" aria-controls="collapseExample2">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>パスワード</h4>
                        <p>ログインパスワードを変更します</p>
                        <div class="collapse" id="collapseExample2">
                            <form action="#">
                                @csrf
                                <label class="form-label" for="currentPassword">現在のパスワード</label>
                                <input type="text" class="form-control" id="currentPassword" name="currentpassword"
                                    value="{{ $user->name }}">
                                <label class="form-label" for="newPassword">新しいパスワード</label>
                                <input type="text" class="form-control" id="newPassword" name="newpassword"
                                    value="{{ $user->name }}">
                                <label class="form-label" for="newPasswordAgain">新しいパスワード(再度)</label>
                                <input type="text" class="form-control" id="newPasswordAgain" name="newpasswordAgain"
                                    value="{{ $user->name }}">
                                <button type="submit" class="btn btn-outline-primary">保存</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <a class="btn btn-outline-primary float-end" data-bs-toggle="collapse" href="#collapseExample3"
                            role="button" aria-expanded="false" aria-controls="collapseExample3">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>記念日</h4>
                        <p>
                            現在の記念日:<span class="border-bottom border-primary border-2">{{ $date }}</span>
                        </p>
                        <div class="collapse" id="collapseExample3">
                            <div class="">
                                <form method='POST' action="#">
                                    @csrf
                                    <label class="form-label" for="currentPassword">現在のパスワード</label>
                                    <input type="text" class="form-control" id="currentPassword"
                                        name="currentpassword" value="{{ $date }}">
                                    <button type="submit" class="btn btn-outline-primary">保存</button>
                                </form>
                            </div>
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
