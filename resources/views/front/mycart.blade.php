   

     @extends('front.master')

     @section('title', 'My Cart')

     @section('css')
        <style type="text/css">
             table {
                margin-top: 100px;
             }
        </style>
     @endsection

    @section('content') 
  
 <table class="table table-bordered table-hover">
    @if($carts->isNotEmpty())
     <tr class="bg-dark text-white">
        <th>#</th>
        <th>{{__('admin.product')}}</th>
        <th>${{__('admin.price')}}</th>
        <th>{{__('admin.quantity')}}</th>
        <th>{{__('admin.total')}}</th>
        <th>{{__('admin.action')}}</th>
     </tr>
      @forelse($carts as $cart)
     <tr>
        <td> {{$loop->iteration}}</td>
        <td>{{$cart->product->trans_name}}</td>
        <td>${{$cart->product->price}}</td>
        <td>{{$cart->quantity}}</td>
        <td>${{$cart->total}}</td>
        <td>
            <form class="d-inline" action="{{route('front.remove', $cart->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Are You Sure ?!')" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>
            </form>
            
        </td>
     </tr>
     @php 
        $newtotal = 0;
        $final_total = $newtotal + $cart->total; 
     @endphp
     <h3> 
         {{$final_total}}
     </h3>
      @empty
       <tr>
          <td colspan="10" class="text-center"> No Data Found </td>
       </tr>

      @endforelse
      @else 
        <p> Your Cart is empty</p>
      @endif

 </table>
  @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
  @endif
      
    @endsection

   