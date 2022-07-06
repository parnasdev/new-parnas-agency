<div class="d-flex w-100 h-100 justify-content-center align-items-center">
    <div x-data="
	{
		rating: 0,
		hoverRating: 0,
		ratings: [{'amount': 1}, {'amount': 2}, {'amount': 3}, {'amount': 4}, {'amount': 5}],
		rate(amount) {
			if (this.rating == amount) {
        this.rating = 0;
      }
			else this.rating = amount;
			$wire.set('comment.rate', this.rating).defer
		},
    currentLabel() {
       let r = this.rating;
      if (this.hoverRating != this.rating) r = this.hoverRating;
      let i = this.ratings.findIndex(e => e.amount == r);
      if (i >=0) {return this.ratings[i].label;} else {return ''};
    }
	}
	" class="d-flex flex-column align-items-center justify-content-center rounded m-2 w-50 h-50 p-3 bg-gray mx-auto">
        <div class="d-flex bg-gray">
            <template x-for="(star, index) in ratings" :key="index">
                <button class="btn-rate-star" type="button" @click="rate(star.amount)" @mouseover="hoverRating = star.amount"
                        @mouseleave="hoverRating = rating"
                        aria-hidden="true"
                        style="width: 40px"
                        :class="{'text-warning': hoverRating >= star.amount}">
                    <i class="icon-star"></i>
                </button>
            </template>
        </div>

    </div>
</div>
