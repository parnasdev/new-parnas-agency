<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Validation\Rule;
use Livewire\Component;

class QuickAddCategory extends Component
{
    public $type = 1;

    public Category $nCategory;

    public function rules()
    {
        return [
            'nCategory.parent_id' => ['nullable' , Rule::exists('categories', 'id')],
            'nCategory.name' => ['required' , 'string' , 'max:100'],
            // 'nCategory.lang' => ['required' , Rule::in(['fa' , 'en'])],
        ];
    }

    public function mount()
    {
        $this->nCategory = new Category(
            // [
            //     'lang' => 'fa'
            // ]
        );
    }

    public function render()
    {
        $categories = Category::query()->whereNull('parent_id')
            ->where('category_type' , $this->type)->get();
        return view('livewire.admin.categories.quick-add-category' , compact('categories'));
    }

    public function submit()
    {
        $this->validate();

        $this->nCategory->category_type = $this->type;

        $this->nCategory->slug = SlugService::createSlug(Category::class , 'slug' , $this->nCategory->name, ['type' => 1]);

        $this->nCategory->save();

        $this->dispatchBrowserEvent('toast-message' , ['message' => 'دسته بندی شما ثبت شد.' , 'icon' => 'success']);

        $this->nCategory = new Category();

        $this->emit('updateCategory');
    }
}
