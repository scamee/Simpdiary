<div class="modal fade" id="MyProfileModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content p-0">
            <div class="modal-header">
                <h4 class="modal-title" id="Title">マイプロフィール</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 profile-body">
                <div class="profile">
                    <div class="profile-img">
                        <img src="{{ Storage::url($user->file_path) }}" alt="{{ $user->file_name }}" />
                    </div>
                    <div class="profile-list">
                        <h3 class="profile-username">{{ $user->name }}</h3>
                        <table>
                            <tr>
                                <th class="td-icon"><i class="fa-solid fa-cake-candles"></i></th>
                                <th class="td-title">誕生日</th>
                                <td class="td-answer">{{ $user->birthday }}</td>
                            </tr>
                            <tr>
                                <th class="td-icon"><i class="fa-solid fa-heart"></i></th>
                                <th class="td-title">趣味＆特技</th>
                                <td class="td-answer">{{ $user->hobby }}</td>
                            </tr>
                            <tr>
                                <th class="td-icon"><i class="fa-solid fa-arrow-trend-up"></i></th>
                                <th class="td-title">将来の目標</th>
                                <td class="td-answer">{{ $user->dream }}</td>
                            </tr>
                            <tr>
                                <th class="td-icon"><i class="fa-solid fa-cart-shopping"></i></th>
                                <th class="td-title">欲しいもの</th>
                                <td class="td-answer">{{ $user->wanted }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
