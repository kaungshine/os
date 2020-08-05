@extends('frontendtemplate')

@section('title', 'Home Page');

@section('content')
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="http://placehold.it/900x400" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">Business Name or Tagline</h1>
        <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
        <a class="btn btn-primary" href="#">Call to Action!</a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">
      @foreach($items as $item)
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">{{ $item->name }}</h2>
            <img src="{{ $item->photo }}" class="img-fluid">
            <table class="table border-0">
              <tr>
                <td class="font-weight-bold">Price :</td>
                <td>{{ $item->price }} $</td>
              </tr>
            </table>
          </div>
          <div class="card-footer">
            <div class="row justify-content-between">
              <div class="col text-center">
                <a href="{{route('itemdetail',$item->id)}}" class="btn btn-primary btn-block">More Info</a>
              </div>
              <div class="col text-center">
                <button class="btn btn-info btn-block add-to-cart" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{$item->price}}" data-photo="{{asset($item->photo)}}">Add To Cart</button>
              </div> 
            </div>
            
          </div>
        </div>
      </div>
      @endforeach
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection