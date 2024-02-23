<div>
    <div class="apt-list">
        @if ($apt == 'No records found.')
            <h3 style="text-align: center;color: #ccc">No entries</h3>
        @else
            @foreach ($apt as $item)
                <div class="user-wrapper">
                    <div class="user-header">
                        <div class="rounded-sm">
                            <img src="./public/asset/profile.jpg" alt="profile" width="60">
                        </div>
                        <p>{{ $item['full_name'] }}</p>
                    </div>
                    <div class="user-msg">
                        <p>{{ $item['topic'] }}</p>
                    </div>
                    <div class="c_date">
                        @php
                            $date = date_create($item['date']);
                            $day = date_format($date, 'd');
                            $month = date_format($date, 'F');
                        @endphp
                        <p>{{ $day }} {{ $month }} {{ $item['time'] }}</p>
                    </div>
                    <div class="user-response">
                        <form class="adm-res" method="POST">
                            <input name="apt_id" type="text" value="{{ $item['apt_id'] }}" style="display: none;">
                            <input name="teach_id" type="text" value="{{ $user['user_id'] }}" style="display: none;">
                            <input name="respond" type="text" placeholder="response">
                            <select name="status">
                                <option value="0">reject</option>
                                <option value="1">accept</option>
                            </select>
                            <button>respond</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
