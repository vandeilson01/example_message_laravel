@extends("layouts.app")

@section("content")
<h1 class="text-danger text-center">Message</h1>

    <form action="" method="post" class="container">
    {{ csrf_field() }}
        <input name="title" type="text" placeholder="Titulo" class="form-control"/>
        <textarea name="body" class="form-control"></textarea>
        <input name="id_user" type="text" placeholder="id do usuario" class="form-control"/>
        <button class="btn btn-primary" type="submit">Salve</button>
    </form>
@endsection