//validation yapısını ve validation sonucu oluşan hataları göstermek için bu kod bloğu kullanıldı
@if(count($errors)>0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
