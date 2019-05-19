
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <section class="invoice">
            <!-- title row -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="page-header">
                  <i class="fa fa-globe"></i> tuku.com
                  <small class="pull-right">Date: 2/10/2014</small>
                </h2>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
               from:
                <address>
                  <strong>{{$data->user->name}}</strong><br>
                  {{$data->user->address}}<br>
                  Email: {{ $data->user->email}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{$data->name}}</strong><br>
                    {{$data->address}}<br>
                    {{$data->portal_code}}<br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice: {{$data->code}}</b><br>
                <br>
                <b>ekspedisi:{{ $data->ekspedisi['name']}}</b><br>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>price</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $total=0;
                    @endphp
                    @foreach ($datas as $item)
                            <tr>
                                <td>{{ $item->qyt}}</td>
                                <td>{{ $item->name}}</td>
                                {{-- <td>{{ $item->product->name}} <img src="{{ asset('assets/dist/img/'.$item->product->photo)}}" alt="product" width="50"></td> --}}
                                <td>{{ number_format($item->product->price)}}</td>
                                <td>{{ number_format($item->subtotal)}}</td>
                            </tr>
                            @php
                                $total +=$item->subtotal;
                            @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-xs-6">
                <strong><p class="lead">Rekening</p></strong>
                <p class="lead">BRI :00000000</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  silahkan transfer ke nomor rekening di atas
                </p>
              </div>
              <!-- /.col -->
              <div class="col-xs-6">
                 <p class="lead">tanggal: {{$data->created_at}}</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td> {{ number_format($total)}}</td>
                    </tr>

                    <tr>
                      <th>ongkir:</th>
                      <td>{{ number_format($data->ekspedisi['value'])}}</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>{{ number_format($total+$data->ekspedisi['value'])}}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


          </section>
          <!-- /.content -->
          <div class="clearfix"></div>
        </div>
    </body>
</html>

