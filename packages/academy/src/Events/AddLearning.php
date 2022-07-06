<?php


namespace Packages\academy\src\Events;


use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Packages\academy\src\Models\Learning;
use Packages\order\src\Models\Order;

class AddLearning
{
    use Dispatchable, SerializesModels;

    public function __construct(Order $order)
    {
        foreach ($order->details()->get() as $detail) {
            Learning::query()->create([
                'post_id' => $detail->post_id,
                'user_id' => $order->user_id,
                'expire' => $this->getExpireDate(),
                'season_unlock' => [$detail->post->seasons()->where('parent' , null)->orderBy('id')->first()?->id]
            ]);
        }
    }

    public function getExpireDate()
    {
        $options = config('options.expireLearning');

        $value = $options['value'];

        list($num , $type) = explode(' ' , $value);

        if ($type == 'Year') {
            return now()->addYears($num);
        }
        return now()->addMonths($num);
    }
}
