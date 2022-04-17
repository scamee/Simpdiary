<div class="modal fade" id="MyProfileModel" tabindex="-1" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
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
                                <td class="td-icon"><i class="fa-solid fa-cake-candles"></i></td>
                                <td class="td-title">誕生日</td>
                                <td class="td-answer">{{ $user->birthday }}</td>
                            </tr>
                            <tr>
                                <td class="td-icon"><i class="fa-solid fa-heart"></i></td>
                                <td class="td-title">趣味＆特技</td>
                                <td class="td-answer">{{ $user->hobby }}</td>
                            </tr>
                            <tr>
                                <td class="td-icon"><i class="fa-solid fa-arrow-trend-up"></i></td>
                                <td class="td-title">将来の目標</td>
                                <td class="td-answer">{{ $user->dream }}</td>
                            </tr>
                            <tr>
                                <td class="td-icon"><i class="fa-solid fa-cart-shopping"></i></td>
                                <td class="td-title">欲しいもの</td>
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
