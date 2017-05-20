@if(count($errors) > 0)
    <div class="alert alert-warning alert-dismissible"style="margin-top: 10px" role="alert">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif