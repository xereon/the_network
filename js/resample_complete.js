<!doctype html>
<html>
 <head>
  <title>JavaScript Image Resample :: WebReflection</title>
 </head>
 <body>
  <input id="width" type="text" value="320" />
  <input id="height" type="text" />
  <input id="file" type="file" />
  <br /><span id="message"></span><br />
  <div id="img"></div>
 </body>
 <script src="resample.js"></script>
 <script>
 (function (global, $width, $height, $file, $message, $img) {
  
  // (C) WebReflection Mit Style License
  
  // simple FileReader detection
  if (!global.FileReader)
   // no way to do what we are trying to do ...
   return $message.innerHTML = "FileReader API not supported"
  ;
  
  // async callback, received the
  // base 64 encoded resampled image
  function resampled(data) {
   $message.innerHTML = "done";
   ($img.lastChild || $img.appendChild(new Image)
   ).src = data;
  }
  
  // async callback, fired when the image
  // file has been loaded
  function load(e) {
   $message.innerHTML = "resampling ...";
   // see resample.js
   Resample(
     this.result,
     this._width || null,
     this._height || null,
     resampled
   );
   
  }
  
  // async callback, fired if the operation
  // is aborted ( for whatever reason )
  function abort(e) {
   $message.innerHTML = "operation aborted";
  }
  
  // async callback, fired
  // if an error occur (i.e. security)
  function error(e) {
   $message.innerHTML = "Error: " + (this.result || e);
  }
  
  // listener for the input@file onchange
  $file.addEventListener("change", function change() {
   var
    // retrieve the width in pixel
    width = parseInt($width.value, 10),
    // retrieve the height in pixels
    height = parseInt($height.value, 10),
    // temporary variable, different purposes
    file
   ;
   // no width and height specified
   // or both are NaN
   if (!width && !height) {
    // reset the input simply swapping it
    $file.parentNode.replaceChild(
     file = $file.cloneNode(false),
     $file
    );
    // remove the listener to avoid leaks, if any
    $file.removeEventListener("change", change, false);
    // reassign the $file DOM pointer
    // with the new input text and
    // add the change listener
    ($file = file).addEventListener("change", change, false);
    // notify user there was something wrong
    $message.innerHTML = "please specify width or height";
   } else if(
    // there is a files property
    // and this has a length greater than 0
    ($file.files || []).length &&
    // the first file in this list 
    // has an image type, hopefully
    // compatible with canvas and drawImage
    // not strictly filtered in this example
    /^image\//.test((file = $file.files[0]).type)
   ) {
    // reading action notification
    $message.innerHTML = "reading ...";
    // create a new object
    file = new FileReader;
    // assign directly events
    // as example, Chrome does not
    // inherit EventTarget yet
    // so addEventListener won't
    // work as expected
    file.onload = load;
    file.onabort = abort;
    file.onerror = error;
    // cheap and easy place to store
    // desired width and/or height
    file._width = width;
    file._height = height;
    // time to read as base 64 encoded
    // data te selected image
    file.readAsDataURL($file.files[0]);
    // it will notify onload when finished
    // An onprogress listener could be added
    // as well, not in this demo tho (I am lazy)
   } else if (file) {
    // if file variable has been created
    // during precedent checks, there is a file
    // but the type is not the expected one
    // wrong file type notification
    $message.innerHTML = "please chose an image";
   } else {
    // no file selected ... or no files at all
    // there is really nothing to do here ...
    $message.innerHTML = "nothing to do";
   }
  }, false);
 }(
  // the global object
  this,
  // all required fields ...
  document.getElementById("width"),
  document.getElementById("height"),
  document.getElementById("file"),
  document.getElementById("message"),
  document.getElementById("img")
 ));
 </script>
</html>


The resample.js File


var Resample = (function (canvas) {

 // (C) WebReflection Mit Style License

 // Resample function, accepts an image
 // as url, base64 string, or Image/HTMLImgElement
 // optional width or height, and a callback
 // to invoke on operation complete
 function Resample(img, width, height, onresample) {
  var
   // check the image type
   load = typeof img == "string",
   // Image pointer
   i = load || img
  ;
  // if string, a new Image is needed
  if (load) {
   i = new Image;
   // with propers callbacks
   i.onload = onload;
   i.onerror = onerror;
  }
  // easy/cheap way to store info
  i._onresample = onresample;
  i._width = width;
  i._height = height;
  // if string, we trust the onload event
  // otherwise we call onload directly
  // with the image as callback context
  load ? (i.src = img) : onload.call(img);
 }
 
 // just in case something goes wrong
 function onerror() {
  throw ("not found: " + this.src);
 }
 
 // called when the Image is ready
 function onload() {
  var
   // minifier friendly
   img = this,
   // the desired width, if any
   width = img._width,
   // the desired height, if any
   height = img._height,
   // the callback
   onresample = img._onresample
  ;
  // if width and height are both specified
  // the resample uses these pixels
  // if width is specified but not the height
  // the resample respects proportions
  // accordingly with orginal size
  // same is if there is a height, but no width
  width == null && (width = round(img.width * height / img.height));
  height == null && (height = round(img.height * width / img.width));
  // remove (hopefully) stored info
  delete img._onresample;
  delete img._width;
  delete img._height;
  // when we reassign a canvas size
  // this clears automatically
  // the size should be exactly the same
  // of the final image
  // so that toDataURL ctx method
  // will return the whole canvas as png
  // without empty spaces or lines
  canvas.width = width;
  canvas.height = height;
  // drawImage has different overloads
  // in this case we need the following one ...
  context.drawImage(
   // original image
   img,
   // starting x point
   0,
   // starting y point
   0,
   // image width
   img.width,
   // image height
   img.height,
   // destination x point
   0,
   // destination y point
   0,
   // destination width
   width,
   // destination height
   height
  );
  // retrieve the canvas content as
  // base4 encoded PNG image
  // and pass the result to the callback
  onresample(canvas.toDataURL("image/png"));
 }
 
 var
  // point one, use every time ...
  context = canvas.getContext("2d"),
  // local scope shortcut
  round = Math.round
 ;
 
 return Resample;
 
}(
 // lucky us we don't even need to append
 // and render anything on the screen
 // let's keep this DOM node in RAM
 // for all resizes we want
 this.document.createElement("canvas"))
);