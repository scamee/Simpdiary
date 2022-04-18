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
                        <a class="btn submit-btn float-end" data-bs-toggle="collapse" href="#collapseExample"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>ユーザー情報変更</h4>
                        <p>ログインユーザーの情報を変更します</p>
                        <div class="collapse" id="collapseExample">
                            <form method="POST" action="/userUpdate" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="date" value="{{ $date }}">
                                {{-- ユーザー画像 --}}
                                <label class="form-label" for="user_img">新しいユーザー画像<span
                                        class="attention">※png/jpeg</span></label>
                                <input type="file" class="form-control" id="user_img" name="user_img"
                                    accept="image/png, image/jpeg">
                                {{-- ユーザ名 --}}
                                <label class="form-label" for="username">新しいユーザー名<span
                                        class="attention">※10文字以内</span></label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $user->name }}">
                                {{-- 誕生日 --}}
                                <label class="form-label" for="birthday">新しい誕生日<span
                                        class="attention">※yyyy-mm-dd</span></label>
                                <input type="text" class="form-control" id="birthday" name="birthday"
                                    value="{{ $user->birthday }}">
                                {{-- 趣味・特技 --}}
                                <label class="form-label" for="hobby">新しい趣味・特技<span
                                        class="attention">※10文字以内</span></label>
                                <input type="text" class="form-control" id="hobby" name="hobby"
                                    value="{{ $user->hobby }}">
                                {{-- 将来の夢 --}}
                                <label class="form-label" for="dream">新しい将来の夢<span
                                        class="attention">※10文字以内</span></label>
                                <input type="text" class="form-control" id="dream" name="dream"
                                    value="{{ $user->dream }}">
                                {{-- 欲しいもの --}}
                                <label class="form-label" for="wanted">新しい欲しいもの<span
                                        class="attention">※10文字以内</span></label>
                                <input type="text" class="form-control" id="wanted" name="wanted"
                                    value="{{ $user->wanted }}">
                                <button type="submit" class="btn submit-btn">保存</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <a class="btn submit-btn float-end" data-bs-toggle="collapse" href="#collapseTheme"
                            role="button" aria-expanded="false" aria-controls="collapseTheme">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>テーマ変更</h4>
                        <p>デザインカラーを変更します</p>
                        <div class="collapse" id="collapseTheme">
                            <form method="POST" action="{{ route('themeUpdate') }}">
                                @csrf
                                <input type="hidden" name="date" value="{{ $date }}">
                                {{-- テーマ --}}
                                <label for="themeform" class='form-label'>テーマ</label>
                                <select id='themeform' class='form-control' name='theme'>
                                    <option value="normal" {{ $user->theme == 'normal' ? 'selected' : '' }}>
                                        ノーマルテーマ
                                    </option>
                                    <option value="dark" {{ $user->theme == 'dark' ? 'selected' : '' }}>
                                        ダークテーマ
                                    </option>
                                </select>
                                <button type="submit" class="btn submit-btn">保存</button>
                            </form>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <a class="btn submit-btn float-end" data-bs-toggle="collapse" href="#collapseExample2"
                            role="button" aria-expanded="false" aria-controls="collapseExample2">
                            <i class="me-1 fa-solid fa-pen"></i>
                        </a>
                        <h4>パスワード</h4>
                        <p>ログインパスワードを変更します</p>
                        <div class="collapse" id="collapseExample2">
                            <form method="POST" action="/passwordUpdate">
                                @csrf
                                <input type="hidden" name="date" value="{{ $date }}">
                                <label class="form-label" for="currentPassword">現在のパスワード</label>
                                <input type="password" class="form-control" id="currentPassword"
                                    name="current_password">
                                <label class="form-label" for="newPassword">新しいパスワード<span
                                        class="attention">※8文字以上</span></label>
                                <input type="password" class="form-control" id="newPassword" name="new_password">
                                <label class="form-label" for="newPasswordAgain">新しいパスワード<span
                                        class="attention">再度入力</span></label>
                                <input type="password" class="form-control" id="newPasswordAgain"
                                    name="new_password_confirmation">
                                <button type="submit" class="btn submit-btn">保存</button>
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
