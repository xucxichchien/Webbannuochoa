
@extends('welcome')            
@section('content')
<left>
<!-- Button trigger modal -->
<div>
<button type="button" class="btn btn-outline-danger fw-bold fs-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Record
  </button>
</div>
</left>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">ADD NEW Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="insertData" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-2">
                        <input type="text" placeholder="Enter Product Name" class="form-control"name="pname"id="">
                </div>
                <div class="mb-2">
                    <input type="text" placeholder="Enter Product Price" class="form-control"name="pprice"id="">
            </div>
            <div class="mb-2">
              <input type="text" placeholder="Enter Product Detail" class="form-control"name="pdetails"id="">
      </div>
            <div class="mb-2">
                     <label for="brandid" class="form-label">brand</label>
                     <select name="brandid" class="form-control">
                      @foreach ($rows as $bdata)
                      <Option
                      value="{{$bdata->BrandID}}">
                      {{$bdata->BrandName}}
                     </Option>
                    @endforeach
                     </select>
                    
                </div>
                <div class="mb-2">
                    <input type="file"  class="form-control"name="image"id="">
            </div>
            <button type="submit"class="btn btn-outline-danger fw-bold fs-4 rounded-pill">add Record</button>
          </form>
        </div>
        <div class="modal-footer" style="">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

<div class="container">
<table class="table mt-2">
    <thead class="bg-danger text-white fw-bold"> 
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Image</th>
        <th>Product Details</th>
        <th>Product Brand</th>
        <th>Product Category</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>  
    <tbody class="text-danger bg-light fs-15">
        @foreach ($data as $item )   
        <tr>

            <form action="updatedelete" method="get">
            <td class="pt-5"><input type="hidden" name="id" value="{{$item['PID']}}">{{$item['PID']}}</td>
            <td class="pt-5"><input type="hidden" name="name" value="{{$item['PName']}}">{{$item['PName']}}</td>
            <td class="pt-5"><input type="hidden" name="price" value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
            <td class="pt-3 "><img src="images/{{$item['PImage']}}" width="100px" height="100px" alt=""></td> 
            <td class="pt-5"><input type="hidden" name="details" value="{{$item['PDetails']}}">{{$item['PDetails']}}</td>
            
            <td class="pt-5"><input type="hidden" name="brandid" value="{{$bdata['BrandID']}}">{{$bdata['BrandName']}}</td>
            <td class="pt-5"><input type="hidden" name="categoryid" value="{{$item['CategoryID']}}">{{$item['CategoryName']}}</td>
            <td class="pt-5"><input type="submit" class="btn btn-outline-danger rounded-pill" name="update" value="Update"></td>
            <td class="pt-5"><input type="submit" class="btn btn-outline-danger rounded-pill" name="delete" value="Delete" ></td>
            </form>
          
        </tr>
        @endforeach
        
           

            
      
    </tbody>
</table>
</div>
  @endsection