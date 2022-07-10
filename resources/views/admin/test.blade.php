{{--@foreach($users as $user)--}}
{{--    {{ dd($user->bookings) }}--}}
{{--@endforeach--}}

{{--@foreach($rooms as $room)--}}
{{--    {{ dd($rooms) }}--}}
{{--    {{ dd($room->bookings) }}--}}
{{--@endforeach--}}

{{--@foreach($apartments as $apartment)--}}
{{--    {{ var_dump($apartment->bookings ) }}--}}
{{--@endforeach--}}


{{--@foreach($bookings as $booking)--}}
{{--    {{ $booking->room->title }}--}}
{{--@endforeach--}}
<?php
$room_id = 63;
//$check_in = '2022-07-11';
//$check_out = '2022-07-13';

$check_in = '2022-07-09';
$check_out = '2022-07-22';
?>

{{ var_dump($availiable_rooms) }}

@include('admin.layouts.alerts._errors')

@if(!$apartment->comments->isEmpty() && $apartment->comments->where('status', 1))
    @foreach($apartment->getComments() as $comment)
        <div class="bottom-comment"><!--bottom comment-->
            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Replay</a>
                <h5>{{$comment->author->first_name}}}</h5>
                <p class="comment-date">
                    {{$comment->created_at->diffForHumans()}}
                </p>
                <p class="comment-rate">
                    {{$comment->rate}}
                </p>
                <p class="para">{{$comment->text}}</p>
            </div>
        </div>
    @endforeach
@endif

@if (Auth::check())
    <div class="leave-comment"><!--leave comment-->
        <h4>Leave a reply</h4>

        <form class="form-horizontal contact-form" role="form" method="POST" action="/comment">
            {{csrf_field()}}
            <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
            <div class="form-group">
                <div class="col-md-12">
                    <textarea class="form-control" rows="6" name="text" placeholder="Write Massage"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <select name="rate" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn send-btn">Post Comment</button>
        </form>


    </div><!--end leave comment-->
@endif
