<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;
use \Illuminate\Database\Eloquent\Model as Eloquent;
use Spatie\HtmlElement\HtmlElement;

abstract class BaseModel extends Eloquent 
{
    public static function getTableName($alias = NULL)
    {   
        $alias = $alias ? (' as '.$alias) : '';

        $tablename = with(new static)->getTable();

        return $tablename.$alias;
    }
    public static function as($alias=null)
    {
        return self::getTableName($alias);
    }
    public static function pas($alias=null) # with prefix
    {
        return self::getPrefix().self::getTableName($alias);
    }
    public static function fieldPrefix($alias=null)
    {
        return self::getPrefix().($alias ?? '');        
    }
    public static function getPrefix()
    {
        return DB::connection(with(new static)->getConnectionName())->getTablePrefix();
    }
    public static function getTableNameWithPrefix($alias = NULL)
    {
        $alias = $alias ? (' as '.$alias) : '';

        return self::getPrefix().self::getTableName().$alias;
    }
    public static function getClassName()
    {
        return self::class;
    }
    public function scopeIsActive($query, $alias='', $is_raw=false) 
    {
        /* do not use if table has no column "active" */

        $alias .= strlen($alias) ? '.' : '';

    	$is_raw ? $query->where(DB::raw($alias.'active'), 1) : $query->where($alias.'active', 1);
    }
    public function scopeIsInactive($query, $alias='') 
    {
        /* do not use if table has no column "active" */

        $alias .= strlen($alias) ? '.' : '';

        $query->where($alias.'active', 0);
    }
    public function getActiveBadgeAttribute()
    {
        return newTag()->span($this->active ? 'Yes' : 'No')->class('badge badge-'.($this->active ? 'primary' : 'danger'))->__toString();
    }
    public function scopeFindActive($query, $id)
    {
        $query->where('id', $id)->isActive();
    }
    public static function keyName()
    {
        return with(new static)->getKeyName();
    }
    public function getId10Attribute()
    {
        return $this->{ self::keyName() } ? str_pad($this->{ self::keyName() }, 10, '0', STR_PAD_LEFT) : null;
    }
    public function getReferenceViewAttribute()
    {
        $a = HtmlElement::render('a', ['href' => base_url((ci()->ctrl_route ?? '').'/'.$this->{ self::keyName() }), 'data-loading'], HtmlElement::render('button.btn.btn-primary.btn-xs', [], 'View')
        );

        return $a;
    }
    public function getReferenceAttribute()
    {
        $a = HtmlElement::render('a', ['href' => base_url((ci()->ctrl_route ?? '').'/'.$this->{ self::keyName() }), 'data-loading'], HtmlElement::render('button.btn.btn-primary.btn-xs', [], 'View')
        );

        return $a;

        return $this->{ self::keyName() } ? HtmlElement::render('a', ['href' => base_url((ci()->ctrl_route ?? '').'/'.$this->{ self::keyName() }), 'data-loading'], $this->id10) : null;
    }
    public function getDateCreatedAttribute()
    {
        return $this->created_at ? $this->created_at->format(DATETIME_ENG) : null;
    }
    public static function select2($text_field, $value_field=null, $filters=array(), $include_nothing_selected=true)
    {
        $table = with(new static)::select(($value_field ?? 'id').' as value', $text_field.' as text');

        if ($filters) $table = $table->where($filters);

        $table = $table->orderBy($text_field)
        ->get()
        ->each
        ->setAppends([])
        ->toArray();

        if ($include_nothing_selected)
            array_unshift($table, ['value' => 0, 'text' => 'Nothing selected']);

        return $table;
    }
    public static function is_unique($id, $field)
    {
        return 'tuple_unique['.join('.', [self::getTableNameWithPrefix(), self::keyName(), $id ?? '0', $field]).']';
    }
    public static function is_exists($label, $field=null)
    {
        return 'tuple_exists['.join('.', [self::getTableNameWithPrefix(), $field ?? self::keyName(), $label]).']';
    }
    public static function required($label, $field=null)
    {
        return 'tuple_required['.join('.', [self::getTableNameWithPrefix(), $field ?? self::keyName(), $label]).']';
    }
}