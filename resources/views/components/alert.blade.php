@if (session()->has('message'))
  <?php
    $messageType = session()->get('message.type', 'info');
    $message = session()->get('message.text');
  ?>
  <div class="alert alert-{{ $messageType }}">
    <b>{{ $message }}</b>
  </div>
@endif

@if (session()->has('warning'))
  <div class="alert alert-warning">
    Warning : <b>{{ session()->get('warning') }}</b>
  </div>
@endif

@if (session()->has('success'))
  <div class="alert alert-success">
    Success : <b>{{ session()->get('success') }}</b>
  </div>
@endif

@if (session()->has('danger'))
  <div class="alert alert-danger">
    Danger : <b>{{ session()->get('danger') }}</b>
  </div>
@endif

