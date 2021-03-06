<?php


namespace App\Http\Extra;


use Illuminate\Support\Collection;

trait TableFunction
{
    public ?string $model = null;
    public bool $useScout = false;
    public bool $softDelete = false;

    /**
     * get data form model
     * @param mixed $perpage
     * @param string|null $keyword : key for search in your model must have scopeSearch
     * @param Collection|null $options : options where or whereIn if softDelete is true use trash for get trash
     * @return mixed
     */
    public function getData($perpage = 15 , string $keyword = null ,Collection $options = null , $type = null , $showAll = true) {
        if ($options->where('condition' , 'trash')->isEmpty()) {
            $data = $this->model::query();
        } else {
            $data = $this->model::onlyTrashed();
        }

        if (!$showAll) {
            $data->where('user_id' , user()->id);
        }

        if (!is_null($keyword) && $keyword != '') {
            if (!is_null($type)) {
                $data->search($keyword , $type);
            } else {
                $data->search($keyword);
            }
        }

        $wheres = [];
        foreach ($options as $option) {
            if ($option['except'] != $option['value']) {
                switch ($option['condition']) {
                    case 'where':
                        $data->where($option['key'] , $option['value']);
                        break;
                    case 'whereIn':
                        $data->whereIn($option['key'] , $option['value']);
                        break;
                    case 'order':
                        $data->orderBy($option['key'] , $option['value']);
                        break;
                    case 'whereHas':
                        $data->whereHas($option['rel'] , function ($query) use($option) {
                            $query->where($option['key'] , $option['value']);
                        });
                        break;
                }
            }
        }



        return $data->paginate($perpage);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->model::find($id)->delete();

        $this->dispatchBrowserEvent('toast-message' , ['message' => $this->softDelete ? '???? ?????? ?????????? ???????????? ???????? ??????.' : '?????????? ?????? ????.' , 'icon' => 'success']);
    }

    /**
     * @param $id
     */
    public function restore($id)
    {
        $this->model::withTrashed()->find($id)->restore();

        $this->dispatchBrowserEvent('toast-message' , ['message' => ' ?????????????? ????.' , 'icon' => 'success']);
    }

    /**
     * @param $id
     */
    public function forceDelete($id)
    {
        $this->model::withTrashed()->find($id)->forceDelete();

        $this->dispatchBrowserEvent('toast-message' , ['message' => '?????????? ?????? ????.' , 'icon' => 'success']);
    }

    /**
     * @param $id
     * @param bool $force
     * @param bool $restore
     */
    public function message($id , $force = false , $restore = false)
    {
       if ($this->softDelete) {
           if (!$restore) {
               $this->dispatchBrowserEvent('deleteMessage' , ['event' => $force ? 'forceDelete': 'delete' , 'id' => $id , 'force' => $force]);
           } else {
               $this->dispatchBrowserEvent('message' , ['message' => '?????? ???????????????? ?????????????? ??????????' , 'icon' => 'warning' , 'title' => '?????????????? ????????????' , 'btnCText' => '??????' , 'btnCAText' => '??????' , 'event' => 'restore' , 'data' => $id]);
           }
       } else {
           $this->dispatchBrowserEvent('deleteMessage' , ['event' => 'delete' , 'id' => $id , 'force' => true]);
       }
    }

    abstract public function actionMessage();

    abstract public function selectedAction();
}
