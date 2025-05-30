 @if(count($module_permissions) > 0)
  @php
    $module_role_permissions = [];
    if(!empty($role_permissions)) {
      $module_role_permissions = $role_permissions;
    }
  @endphp
  @foreach($module_permissions as $key => $value)
 @if(($key == 'Repair' && !empty($get_permissions['repair_module']) && $get_permissions['repair_module']) || ($key == 'Manufacturing' && !empty($get_permissions['mf_module']) && $get_permissions['mf_module']))
  <hr>
  <div class="row check_group">
    <div class="col-md-1">
      <h4><label>{{$key}}</label></h4>
    </div>
    <div class="col-md-2">
      <div class="checkbox">
        <label>
          <input type="checkbox" class="check_all input-icheck"> {{ __( 'role.select_all' ) }}
        </label>
      </div>
    </div>
    <div class="col-md-9">
      @foreach($value as $module_permission)
      @php
        if(empty($role_permissions) && $module_permission['default']) {
          $module_role_permissions[] = $module_permission['value'];
        }
      @endphp
      <div class="col-md-12">
        <div class="checkbox">
          <label>
            {!! Form::checkbox('permissions[]', $module_permission['value'], in_array($module_permission['value'], $module_role_permissions), 
            [ 'class' => 'input-icheck']); !!} {{ $module_permission['label'] }}
          </label>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
  @endforeach
@endif