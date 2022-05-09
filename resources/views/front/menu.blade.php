<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">{{Str::Words(Auth::user()->name,2)}}</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('profil')}}">Üyelik Bilgileri</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('sepet')}}">Sepet</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Siparişler</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">İadeler</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Favoriler</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">İndirim Çekleri</a>
    </div>
</div>
