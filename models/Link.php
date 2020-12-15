<?php namespace Pensoft\Links\Models;

use Model;

/**
 * Model
 */
class Link extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_links_link';

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $rules = [];

    public $belongsTo = [
        'category' => [Category::class, 'key' => 'category_id', 'otherKey' => 'id']
    ];

    public function beforeValidate()
    {
        if (empty($this->sort_order)) {
            $this->sort_order = static::max('sort_order') + 1;
        }
    }
}
