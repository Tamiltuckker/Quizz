<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
  @if (session()->has('success'))  
    <div class="alert alert-success alert-dismissible fade show" role="alert">  
      {{ session()->get('success') }}
  </div>
  @endif
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
     @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
     @endforeach
    </ul>
</div>
@endif     

<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
  @if (session()->has('warning'))  
    <div class="alert alert-danger alert-dismissible fade show" role="alert">  
      {{ session()->get('warning') }}
  </div>
  @endif
</div>     

<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
  @if (session()->has('info'))  
    <div class="alert alert-info alert-dismissible fade show" role="alert">  
      {{ session()->get('info') }}
  </div>
  @endif
</div>
    
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please check the form below for errors</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif