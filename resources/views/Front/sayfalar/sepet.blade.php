@extends('Front.main')
@section('content')

    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th scope="col" style="width: 15%">Product</th>
                    <th scope="col" style="width: 25%">Content</th>
                    <th scope="col" style="width: 20%">Price</th>
                    <th scope="col" style="width: 20%">Quantity</th>
                    <th scope="col" style="width: 20%">Total</th>
                </tr>
                @foreach($sepets as $sepet)
                    @foreach(\App\Models\Products::where('id',$sepet->urun_id)->get() as $urun)

                        <tr>
                            <td><img style="width:180px; height: 180px;" src="{{$urun->img_url}}"></td>
                            <td><p>{{$urun->content}}</p></td>
                            <td style="font-family:sans-serif"><p>$ {{number_format($urun->price,'2',',','.')}}</p></td>
                            <td>
                                <div class="product_count">
                                    <input type=button onclick="increase()" value="+"/>


                                    <input
                                        style="width: 80px; font-family:sans-serif; padding-left: 20px;padding-right: 20px; text-align: center;"
                                        type="text" id="numbertext" maxlength="12"
                                        value="0" title="Quantity:"/>
                                    <input type=button onclick="decrease()" value="-"/>


                                </div>
                            </td>
                            <td>
                                <h4 style="font-weight: bold; font-family:sans-serif">
                                    $ {{number_format($sepet->number*=$urun->price,'2',',','.')}}
                                </h4>
                            </td>
                            <td>
                                <a href="{{route('Front.sepet.product_remove',$sepet->id)}}">Sil</a>
                            </td>
                        </tr>

                    @endforeach
                @endforeach

                <tr>
                    <th></th>
                    <th></th>
                    <th colspan="2" style="text-align: right"> Toplam Tutar (KDV Dahil):</th>


                    <th>$ {{number_format(0,'2',',','.')}}</th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="3" style="text-align: right"><a href="{{route('Front.payment')}}"
                                                                 class="primary-btn order-submit"
                                                                 style="background-color: red;color:white">
                            Alışverişi Tamamla</a></th>

                </tr>

            </table>

            <a href="{{route('Front.sepet.remove')}}" class="btn btn-info pull-left">Sepeti Boşalt</a>

        </div>

    </div>
    </div>
    <div style="height: 30px"></div>

@endsection

@section('scripts')
    <script>
        function increase() {

            alert(2);
        }

        function decrease() {

            alert(5);
        }
    </script>
@endsection
