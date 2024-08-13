<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>First name</label>
			<input class="form-control" type="text" {'name="rel_user_extension[first_name]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="First name" value="{$prev_data.rel_user_extension.first_name|default:''}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Middle name</label>
			<input class="form-control" type="text" {'name="rel_user_extension[middle_name]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="Middle name" value="{$prev_data.rel_user_extension.middle_name|default:''}" {'readonly'|iif:!$can_update_profile|default:false}>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Last name</label>
			<input class="form-control" type="text" {'name="rel_user_extension[last_name]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="Last name" value="{$prev_data.rel_user_extension.last_name|default:''}" {'readonly'|iif:!$can_update_profile|default:false}>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Extension name</label>
			<input class="form-control" type="text" {'name="rel_user_extension[extension_name]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="Extension name" value="{$prev_data.rel_user_extension.extension_name|default:''}" {'readonly'|iif:!$can_update_profile|default:false}>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" {'name="rel_user_extension[email]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="Email" value="{$prev_data.rel_user_extension.email|default:''}" {'readonly'|iif:!$can_update_profile|default:false}>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Address</label>
			<input class="form-control" type="text" {'name="rel_user_extension[address]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="Address" value="{$prev_data.rel_user_extension.address|default:''}" {'readonly'|iif:!$can_update_profile|default:false}>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Mobile</label>
			<input class="form-control" type="text" {'name="rel_user_extension[mobile]"'|iif:($can_update_profile|default:false):'readonly'} placeholder="Mobile" value="{$prev_data.rel_user_extension.mobile|default:''}" {'readonly'|iif:!$can_update_profile|default:false}>
		</div>
	</div>
</div>