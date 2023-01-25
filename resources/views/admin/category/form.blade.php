<div class="form-group row justify-content-center left_css col-md-12 ">
    <label for="name" class="col-md-12 control-label">Name</label>
    <div class="col-md-12">
        <input class="form-control" required="required" value="{{$category->name}}" name="name" type="text" id="name" onkeyup="createSlug(this.value);">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

    </div>
</div>


<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label class="col-md-12 control-label">Slug</label>
    <div class="col-md-12">
      <input type="text" class="form-control" name="slug" id="slug" value="{{$category->slug}}" readonly>
      {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::file('image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        <br>
        <br>

        <img   id="target" width="200px;">
        @if($category->image!="")
        <img  src="{{asset($category->image)}}" width="200px;">
        @endif
    </div>


</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


@push('js')

<script type="text/javascript">


function showImage(src,target) {
  var fr = new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };
  src.addEventListener("change",function() {
    // fill fr with image data
    fr.readAsDataURL(src.files[0]);
  });
}

var src = document.getElementById("image");
var target = document.getElementById("target");
showImage(src,target);

</script>

<script type="text/javascript">

function createSlug(inputValue)
{
let slug = inputValue.split(" ").join("-");
document.getElementById('slug').value = (slug.toLowerCase());
}



</script>

@endpush
