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

{{--{{ var_dump($availiable_rooms) }}--}}
{{--{{ var_dump($booked_rooms) }}--}}

{{--{{ var_dump($test1) }}--}}
{{--{{ var_dump($test2) }}--}}
{{--{{ var_dump($ids) }}--}}
{{ var_dump($availiable_rooms) }}
{{--@foreach($availiable_rooms as $availiable_room)--}}
{{--    {{ $availiable_room->title }}--}}
{{--@endforeach--}}



{{--@foreach($dateRange as $range)--}}
{{--    {{ $range }}--}}
{{--    @foreach($range as $test)--}}
{{--        {{ $test }}--}}
{{--    @endforeach--}}
{{--@endforeach--}}
