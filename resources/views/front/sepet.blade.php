@extends('front.layouts.master')
@section('content') 
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex" id="wrapper" style="margin-top:85px">
                <!-- Sidebar-->
                @include('front.menu')
                <!-- Page content wrapper-->
                <div id="page-content-wrapper">
                    <!-- Top navigation-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                        <div class="container-fluid">
                            <button class="btn btn-primary" id="sidebarToggle">Menü</button>                            
                        </div>
                    </nav>
                    <!-- Page content-->
                    <div class="container-fluid">
                        <div class="col-md-8 offset-md-2 mt-4 shadow p-3 mb-5 bg-body rounded">
                            <h3 class="text-center text-primary">Sepetim</h3>
                            <hr>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ürün Resmi</th>
                                    <th scope="col">Ürün Kodu</th>
                                    <th scope="col">Ürün Adı</th>
                                    <th scope="col">Adet</th>
                                    <th scope="col">Fiyat</th>
                                    <th scope="col">İşlemler</th>                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  @php($i=0) 
                                  @php($toplam=0)                              
                                  @foreach ($sepetim as $item)
                                  @php($i++)
                                  <tr>
                                    <th scope="row">{{$i}}</th>
                                   <td><img src="{{$item->getUrun->photo}}" width="50" alt=""></td>
                                   <td>{{$item->urun_id}}</td>
                                    <td>{{$item->getUrun->name}}</td>
                                    <td>{{$item->adet}}</td>
                                    <td>{{$item->fiyat}}$</td>
                                    <td>
                                      <a class="btn btn-primary btn-sm" href=""><i class="fa fa-plus" aria-hidden="true"></i></a>
                                      <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                    @php($toplam=$toplam+$item->fiyat)
                                  </tr> 
                                  @endforeach                         
                                  
                                </tbody>

                              </table>  
                            <div class="col-md-10 offset-md-1">
                              <p class="text-right">  <b ><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Sepet Toplamı:{{$toplam}}$</b>  </p>
                              <p class="text-right"><b>Kdv(%8):{{$toplam*0.18}}$</b> </p>
                            </div>
                            <div class="d-grid gap-2">
                              <button class="btn btn-primary" type="button"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Sepeti Onayla</button>
                              <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Sepeti Boşalt</button>
                            </div>
                        </div>
                       </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="{{asset('sidebar')}}/css/styles.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('sidebar')}}/js/scripts.js"></script>
@endsection