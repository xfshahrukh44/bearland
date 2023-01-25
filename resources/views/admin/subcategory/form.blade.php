@php $categories = DB::table('categories')->get(); @endphp


<div class="form-group row justify-content-center {{ $errors->has('parent_category') ? 'has-error' : ''}}">
    
    
    <label for="parent_category" class="col-md-4 control-label">{{ 'Parent Category' }}</label>
    <div class="col-md-6">
        
        <select name="parent_category" class="form-control">
            
            @foreach($categories as $category)
            
            @if($category->id==$subcategory->parent_category)
            
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
            
        </select>
        
        {!! $errors->first('parent_category', '<p class="help-block">:message</p>') !!}
    
    </div>


</div>

    <div class="form-group row justify-content-center {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $subcategory->name ?? ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    
    
    </div>

    
    <div class="form-group row justify-content-center {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="image" type="file" id="image" value="{{ $subcategory->image ?? ''}}" required>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
          @if($subcategory->image!="")
        <img src="{{asset($subcategory->image)}}" width="100px">
       @endif
    </div>
    
  
    
    
    
    </div>







<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
    </div>
</div>
