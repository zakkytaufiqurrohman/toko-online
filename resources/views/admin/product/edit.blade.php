@extends('admin.layouts.app')
@section('asset-top')
{{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
@endsection

@section('content')
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Pruduct</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ route('product.update',$data->id)}} " method="post" role="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
          <div class="box-body">
            <div class="form-group">
              <label for="id">Nama barang</label>
            <input id="id" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$data->name}}" required>
                 @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                    <label for="id">Deskripsi</label>
                    <textarea id="my-editor" name="description" class="form-control">{!!  $data->description !!}</textarea>
                       @if ($errors->has('description'))
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
            </div>
            <div class="form-group">
                    <label for="id">stock</label>
            <input id="id" type="number" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" value="{{$data->stock}}" required>
                       @if ($errors->has('stock'))
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('stock') }}</strong>
                          </span>
                      @endif
            </div>
            <div class="form-group">
                    <label for="id">price</label>
                    <input id="id" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$data->price}}" required>
                       @if ($errors->has('price'))
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                          </span>
                      @endif
            </div>
            <div class="form-group">
                    <label for="id">category</label>
                    <select name="category_id" id="id"  class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
                        <option value="">---pilih category----</option>
                        @foreach ($category as $item)
                            <option value="{{$item->id}}" {{ ($data->category_id == $item->id ) ? 'selected="selected"' : ''}}>{{$item->name}}</option>
                            {{-- @foreach ($item->masterCategory as $sub)
                                 <option value="">-{{$sub->name}}</option>
                            @endforeach --}}
                        @endforeach

                    </select>
                    @if ($errors->has('category_id'))
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category_id') }}</strong>
                          </span>
                    @endif
            </div>
            <div class="form-group">
              <label for="exampleInputFile">upload foto</label><br>
              <img src="{{ asset('assets/dist/img/'.$data->photo)}}" alt="photo" width="60">
              <input type="file" id="exampleInputFile" name='photo'>
            <input type="hidden" name='photo_lama' value="{{ $data->photo}}">

            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

@endsection
@section('asset-buttom')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script>
    $('textarea[name=description]').ckeditor({
      height: 100,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>
@endsection
