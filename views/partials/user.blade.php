<div class="tab-content">
    <div class="tab tab2 consultations">
        <div class="consults">
            @if ($apt == 'No records found.')
                <h3 style="text-align: center;color: #ccc">No entries</h3>
            @else
                @foreach ($apt as $item)
                    @if ($item['user_id'] == $user['user_id'])
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
                            <div class="response">
                                @foreach ($fbs as $fb)
                                    @if ($item['apt_id'] == $fb['apt_id'])
                                        <div class="fb-wrapper">
                                            <div class="fb-head">
                                                <div class="fb-status">
                                                    <p>
                                                        @if ($fb['status'])
                                                            <i class="fas fa-check-square accept"></i>
                                                        @endif
                                                        @if (!$fb['status'])
                                                            <i class="fas fa-times-circle reject"></i>
                                                        @endif
                                                    </p>
                                                </div>
                                                <p><b>{{ $fb['full_name'] }}</b></p>

                                            </div>
                                            <div class="fb-remarks">
                                                <p>{{ $fb['remarks'] }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <form class="tab tab1 ct-form">
        <div class="form-wrapper">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input name="fullname" type="text" id="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <i class="fas fa-id-card"></i>
                <input name="stud_id" type="number" id="stud_id" placeholder="Student ID">
            </div>
            <div class="form-group">
                <i class="fas fa-book"></i>
                <input name="sub_code" type="text" id="sub_code" placeholder="Subject Code">
            </div>
            <div class="con-sep">
                <div class="form-group">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="date" name="day" id="date" name="date">
                </div>
                <div class="form-group">
                    <i class="fas fa-clock"></i>
                    <input type="time" name="time" id="time" name="time">
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-group">
                    <i class="fas fa-comment"></i>
                    <textarea name="concern" id="concern" cols="30" rows="15" placeholder="Your Concern"></textarea>
                </div>
                <button type="button" class="con-submit">Submit</button>
            </div>
        </div>
    </form>
</div>
