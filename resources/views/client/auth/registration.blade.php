
@include('admin.layouts.alerts._errors')

<form action="/registration" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Імя</label>
        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Прізвище</label>
        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
    </div>

    <div class="form-group">
        <label>Стать</label>
        <select class="form-control" name="gender">
            <option value="Чоловік" selected>Чоловік</option>
            <option value="Жінка">Жінка</option>
        </select>
    </div>

    <div class="form-group">
        <label>Телефон</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
    </div>

    <div class="form-group">
        <label>Пошта</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Пароль</label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
    </div>

    <div class="form-group">
        <label>Підтвердіть Пароль</label>
        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
