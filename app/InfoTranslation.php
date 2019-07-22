<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class InfoTranslation extends Model
{
    public static function getCategories()
    {
        return DB::select('select * from info_category');
    }

    public static function getSections($id)
    {
        return DB::select('select info_sections.name, info_sections.id 
        from info_category, info_sections 
        where info_sections.category_id = info_category.id  
        and info_category.id = ?', [$id]);
               //where('age', '>', 200);
    }
    
}
