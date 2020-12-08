@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center"> <label style="margin-top: 0px; font-size:45px;"> Product </label> </div>
        <div class="content" style="margin: 0px;">
            <div class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Transact</div> 
            <div class="container" style="margin-top: 15px;">
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <th> Product Code </th>
                            <th> Product Name </th>
                            <th> Category </th>
                            <th> Quantity</th>
                            <th> Selling Price </th>
                         </tr>
                    </thead>
                    <tbody>
                @foreach($items as $item)
                @if($item -> quantity_left>0)
                <tr>
                    <td> {{ $item -> item_code}}</td> 
                    <td> {{ $item -> item_name}}</td>
                    <td> {{ $item ->category}}</td>
                    <td> {{ $item ->quantity_left}}</td>
                    <td> {{ $item ->selling_price}}</td>
                </tr> 
                @endif
             @endforeach
            </tbody>
            </table>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Transact </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form >
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label> Select Product </label>
                    <select name="s_product" class="form-control">
                        @foreach($items as $item)
                        <option cllass="form-control" value={{$item -> item_code}}>{{$item -> item_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="item_name"> Quantity:
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  class="form-control"  name="s_quantity" required>  </label>
                </div>
                
            </div>
            </form>
                 <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 <div id="checkOut" class="btn btn-success">Checkout</div>
                </div>
         
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#checkOut').click(function(e){
            var product_id =  $('select[name="s_product"]').val()
            var quantity  = $('input[name="s_quantity"]').val()

            $.ajax({
                type: 'POST',
                url: 'checkout',
                data: {
                    '_token' : $('input[name="_token"]').val(),
                    'product_id': product_id,
                },
            success: function(data){
                console.log(data[0])
                console.log(quantity>data[0].quantity)
                var total = quantity * data[0].selling_price;
                var newQuantity = data[0].quantity_left - quantity;
                if(quantity>data[0].quantity_left){
                    swal({
                    title: "Not Enough Stocks",
                    text: `${data[0].quantity_left} products left`,
                    type: "error",
                    confirmButtonText: "Acknowledge",
                    closeOnConfirm: false
                    })

                }

                else{
                    swal({
                    title: `Total Price: ${total}`,
                    text: `Proceed With Checkout?`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                    closeOnConfirm: false
                },
                function(){
                        $.ajax({
                        type:'POST',
                        url:'inventoryUpdate',
                        data:{
                        '_token' : $('input[name="_token"]').val(),
                        'product_id': product_id,
                        'quantity_left': newQuantity
                        },
                        success: function(data){
                            swal({
                            title: "Inventory Updated",
                            text: 'Transaction complete',
                            type: "success",
                            confirmButtonText: "Acknowledge",
                            closeOnConfirm: false
                            },
                            function(){
                                location.reload()
                            }  
                            )

                        }
                    })
                }
               
                
                
                )   
                }
                
               
                
            },
        })

        })
    })

</script>
    
@endsection
