<div class="form-group row justify-content-center {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">

      <select name="category" class="form-control" id="category_select">
        @foreach($categories as $cat)
        @if($store->category == $cat->id)
        <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
        @else
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endif
        @endforeach
      </select>

        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}

    </div>
</div>

<div class="form-group row justify-content-center {{ $errors->has('sub_category') ? 'has-error' : ''}}">
    <label for="category" class="col-md-4 control-label">{{ 'Sub Category' }}</label>
    <div class="col-md-6">

      <select name="sub_category" class="form-control" id="sub_category_dropdown">

        @foreach($sub_categories as $sub_cat)
        @if($store->sub_category == $sub_cat->id)
        <option value="{{$sub_cat->id}}" selected>{{$sub_cat->name}}</option>
        @else
        <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
        @endif
        @endforeach



      </select>

        {!! $errors->first('sub_category', '<p class="help-block">:message</p>') !!}

    </div>
</div>

<div class="form-group row justify-content-center {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $store->name ?? ''}}"  onkeyup="generateSlug(this.value);" required >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug" class="col-md-4 control-label">{{ 'Slug' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ $store->slug ?? ''}}" required readonly>
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row justify-content-center {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="type" type="text" id="type" value="{{ $store->type ?? ''}}" >
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center {{ $errors->has('unit_of_measure') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Unit Of Meaasure' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="unit_of_measure" type="text" id="uom" value="{{ $store->unit_of_measure ?? ''}}" required>
        {!! $errors->first('unit_of_measure', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group row justify-content-center {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="text" id="price" value="{{ $store->price ?? ''}}" required>
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('sku') ? 'has-error' : ''}}">
    <label for="sku" class="col-md-4 control-label">{{ 'Sku' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sku" type="text" id="sku" value="{{ $store->sku ?? ''}}" required>
        {!! $errors->first('sku', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('length') ? 'has-error' : ''}}">
    <label for="length" class="col-md-4 control-label">{{ 'Length' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="length" type="text" id="length" value="{{ $store->length ?? ''}}" required>
        {!! $errors->first('length', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('height') ? 'has-error' : ''}}">
    <label for="height" class="col-md-4 control-label">{{ 'Height' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="height" type="text" id="height" value="{{ $store->height ?? ''}}" required>
        {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('width') ? 'has-error' : ''}}">
    <label for="width" class="col-md-4 control-label">{{ 'Width' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="width" type="text" id="width" value="{{ $store->width ?? ''}}" required>
        {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="image" type="file" id="image" value="{{ $store->image ?? ''}}">

        @if($store->image!="")
        <img src="{{asset($store->image)}}" width="200px;">
        @endif


        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row justify-content-center {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="col-md-4 control-label">{{ 'Color' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="color" type="text" id="color" value="{{ $store->color ?? ''}}" >
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="color" class="col-md-4 control-label">{{ 'Detail' }}</label>
    <div class="col-md-6">

          <textarea class="form-control" name="detail"  id="summary-ckeditor" value="{{ $store->detail ?? ''}}" >{{ $store->detail ?? ''}}</textarea>

        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
    </div>
</div>


@push('js')

<script type="text/javascript">

generateSlug = (str) => {
let slug =  str.split(" ").join("-").toLowerCase();
document.getElementById("slug").value = slug;
}


 $('#category_select').change(function(){
    var id = $(this).val();

    console.log(id);

    $.ajax({
        type: "GET",
        url: "category/"+id,

        success: function(data) {
        //console.log(data[0]);



        }
    });


 });




</script>

@endpush
