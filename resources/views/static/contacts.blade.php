@extends('layouts.default')
@section('content')
    <h1>Контакты</h1>
    <div class="row mb-3">
        <div class="col-8">
            <h4>Наши контакты</h4>
            <ul class=" mb-3">
                <li>Адрес: ул. Татарская 2Б офис 715</li>
                <li>Телефон: +3805553535</li>
                <li>Email: exemple@gmail.com</li>
            </ul>
            <h4>Связаться с нами</h4>
            <form method="POST" action="">
                <div class="mb-3">
                <label for="name" class="form-label">Ваше имя</label>
                <input type="text" class="form-control" required id="name" name='name' placeholder="Ivan Ivanov">
                </div>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Электронный адрес</label>
                <input type="email" class="form-control" required name='email' id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel"  pattern="(\+380)(\d{9})"  class="form-control" id="phone" name='phone' placeholder="+380998887744">
                </div>
                <div class="mb-3">
                <label for="exampleFormControlTextarea1"  class="form-label">Ваше сообщение</label>
                <textarea class="form-control" name='text' required id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Отправить сообщение</button>
            </form>
        </div>
    </div>

@endsection