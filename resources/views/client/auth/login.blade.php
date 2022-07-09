
@include('admin.layouts.alerts._errors')
@include('admin.layouts.alerts._success')

<form action="/login" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Пошта</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Пароль</label>
        <input type="password" class="form-control" name="password" value="">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if (Auth::check())
    залогінений
@else
    не залогінений
@endif
