<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class UsersController extends CrudController
{
	public $tpl_dir = 'modules/default/users';

	public $ctrl_model = AppUser::class;

	public $title = 'User';
	
	public $title_field = 'username';

	function __construct()
	{
		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			['name', null, 'fullname'],
			'username',
			Tableci::DATE_CREATED,
			Tableci::ACTIVE
		])
		->addExclusion('fullname', Tableci::HTML + Tableci::DATATABLE);
		
		parent::__construct();
	}
	public function reset_password() 
	{
		$user = $this->ctrl_model::with('rel_user_extension')->find( post('id', 'intval') );

		$this->return_if_not_found($user);

		$user->password = Auth::encryptPassword('12345');
		$user->save();

		setFlashdata('success_message', "{$this->title} \"".$user->{ $this->title_field }."\" password successfully reset");
		
		redirect(base_url("{$this->ctrl_route}/{$user->id}"));
	}

	# hooks

	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with(['rel_user_extension' => function ($query)
		{
			$query->select('user_id', 'first_name', 'last_name');
		}])
		->select($this->settings['tableci']['index']->sql_fields)
		->where('visible', 1)
		->where('registered', 0)
		->orderBy('id')
		->get()
		->each(function (&$tuple, $key)
		{
			$tuple->fullname = strlen(trim($tuple->name)) ? $tuple->name : $tuple->username;
		});
	}
	public function pre_create(&$tuple=null)
	{
		if (!$tuple) return;

		$user_extension = AppUserExtension::where('user_id', find($tuple, 'id'))->first();

		$tuple['rel_user_extension'] = $user_extension;

		$user_roles = AppRole::from(AppRole::as('a'))
		->select('a.id as value', 'a.role as text', 'b.id as role_id')
		->leftJoin(AppUserRole::as('b'), function ($query) use ($tuple)
		{
			$query->on('b.role_id', 'a.id')
			->on('b.user_id', DB::raw( find($tuple, 'id') ));
		})
		->isActive('a')
		->get()
		->each(function ($item, $key) 
		{
			$item->selected = !!$item->role_id;
			$item->makeHidden('role_id');
		});

		$this->sm->addFlashStatusMessage()
		->assign('user_roles', $user_roles->toArray());
	}
	public function overwrite_tuple_before_delete(&$tuple)
	{
		# $tuple = $tuple->fresh('rel_user_extension.rel_patient');

		$tuple->_display_message = $tuple->rel_user_extension ? ($tuple->rel_user_extension->first_name.' '.$tuple->rel_user_extension->last_name) : $tuple->username;

		$tuple->_display_message = "{$this->title} \"{$tuple->_display_message}\" deleted";
	}
	public function on_tuple_delete_success($tuple)
	{
		if ($tuple->rel_user_extension) {
			$user_extension = $tuple->rel_user_extension;

			delete_upload($user_extension->img_filename);
		}
	}
	public function set_rules(&$rules)
	{
		$rules = 
		[
			rule('username', 
				[
					'required', 
					$this->ctrl_model::is_unique($this->post_data['id'], 'username')
				]
			),
			rule('rel_user_extension[first_name]', 'required', 'first_name'),
			rule('rel_user_extension[last_name]', 'required', 'last_name')
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['username'] 	= post('username', 'trim');
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
	}
	public function on_tuple_create_success($tuple)
	{
		$tuple->password = Auth::encryptPassword('12345');
		$tuple->save();

		$user_extension = AppUserExtension::createExtension($tuple->id, [
			'first_name' => post('rel_user_extension[first_name]', 'strProperCase'),
			'last_name' => post('rel_user_extension[last_name]', 'strProperCase'),
		]);
	}
	public function on_tuple_update_success($tuple, $vars)
	{
		# update user roles

		$user_roles = post('user_roles');

		if ($user_roles)
		{
			$user_roles = json_decode($user_roles, true);

			$query = DB::table(AppUserRole::getTableName())
			->where('user_id', $tuple->id);

			if ($user_roles) $query = $query->whereNotIn('role_id', $user_roles);

			$query->delete();

			foreach ($user_roles as $role_id)
			{
				$app_user_role = AppUserRole::where([
					['user_id', $tuple->id],
					['role_id', $role_id]
				])
				->first() ?? new AppUserRole;

				$app_user_role->user_id = $tuple->id;
				$app_user_role->role_id = $role_id;
				$app_user_role->save();
			}
		}
	}
	public function on_tuple_save_success($tuple, $vars)
	{
		$_bs_tab_name = post('bs_tab_name', 'trim.strToLower');
		$_bs_tab_name = !strStartsWith($_bs_tab_name, '#') ? '' : '?t='.ltrim($_bs_tab_name, '#');

		$title_field = find($vars, 'title_field');

		$sucess_suffix = find($vars, 'sucess_suffix');

		json_response(true, ['redirect' => base_url($this->ctrl_route.'/'.$tuple->id.$_bs_tab_name), 'message' => "{$this->title} \"{$title_field}\" {$sucess_suffix}"]);
	}
}
