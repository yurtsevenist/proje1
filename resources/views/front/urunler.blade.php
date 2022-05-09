@extends('front.layouts.master')
@section('content') 
 <!-- Page Content -->
 <div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>sixteen products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="filters">
            <ul>
                <li class="active" data-filter="*">Tüm Ürünler</li>          
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="filters-content">
              <div class="row grid">
                  @foreach ($urunler as $urun )
                  <div class="col-lg-4 col-md-4 all des">
                    <div class="product-item">
                      <a href="#"><img src="{{$urun->photo}}" alt=""></a>
                      <div class="down-content">
                        <a href="#"><h4>{{$urun->name}}</h4></a>
                        <h6>$ &nbsp;{{$urun->price}}</h6>
                        <p>{{Str::words($urun->info,3)}} <a href="#">devamı</a></p>
                        <ul class="stars">                          
                           @if($urun->point==0)
                           <li title="Ürün Puanı: {{$urun->point}}" style="font-size:10px">Henüz Puanı Yok </li> 
                           @else
                           @for($i=0;$i<$urun->point;$i++)
                           <li title="Ürün Puanı: {{$urun->point}}"><i class="fa fa-star"></i></li>   
                           @endfor
                           @endif
                        </ul>
                        <span>Reviews : {{$urun->review}}</span>
                      </div>
                      <div class="col-md-12 text-center">
                        <a class="btn btn-outline-danger mb-2 ekle-click" href="#" urun_id={{$urun->id}} type="button">Sepete Ekle</a> 
                        <a class="btn btn-outline-info mb-2" href="#" urun_id={{$urun->id}} type="button">İncele</a>                                               
                      </div>
                     
                    </div>
                  </div>
                  @endforeach                
              </div>
            <div class="col-md-6 offset-md-3 text-center">
                 {{$urunler->links('pagination::bootstrap-4')}}
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </div>


@endsection
@section('js')
   <script>
     $(function(){
        $('.ekle-click').click(function(){
          urun_id=$(this)[0].getAttribute('urun_id');
         // console.log(urun_id);
         $.ajax({
           type:'GET',
           url:'{{route('sepeteEkle')}}',
           data:{urun_id:urun_id},
           success:function(data){
             $('#sepetim').text(data)
           },
         })
        });
     });
   </script> 
@endsection