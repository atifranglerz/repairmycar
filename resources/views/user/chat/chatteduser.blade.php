<div>
    @foreach($vendors as $data)
    <a href="#" class="favorite d-flex align-items-center" id="{{$data->vendor->id}}">
        <?php
            $unread = \App\Models\Chat::where([['customer_receiver_id',auth()->user()->id],['vendor_sender_id',$data->vendor_id],['seen',0]])->count('seen');
            $vendor = \App\Models\Vendor::where('id',$data->vendor->id)->first();
            $gettime = strtotime($vendor->online_status)+8;
            $now = strtotime(Carbon\Carbon::now());
            ?>
        <div class="inbox_contact justify-content-between">
            <div class="position-relative contact_img">
                <p id="userNotify">{{$unread}}</p>
                <img src="{{ asset($data->vendor->image)}}">
                @if($now < $gettime)
                    <h1 style="color: rgb(17, 243, 17); font-size: 100px;position: absolute;right: -3px;top: 0" class="online-offline-dot">.</h1>
                @else
                    <h1 style="color:white; font-size: 100px;position: absolute;right: -3px;top: 0" class="online-offline-dot">.</h1>
                @endif
            </div>
            <div class="name_of_contact">
                <p class="mb-0">{{$data->vendor->name}}</p>
            </div>
                <div class="chat_toggle_button">
                    <a href="#" id="del_toggle"><span class="bi bi-three-dots-vertical text-white"></span></a>
                    <div class="submenue shadow d-none" id="delet_user_toggle">
                        <ul>
                            <li><a href="#" class="chatted_delete d-block" id="{{$data->vendor->id}}">
                                    <span class="fa fa-trash text-danger" aria-hidden="true"
                                        style="margin-right: 8px"></span>
                                    {{__('msg.delete')}}</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </a>

    @endforeach
</div>
