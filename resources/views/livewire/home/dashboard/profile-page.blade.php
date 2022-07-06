<div>
    <div class="profile-dashboard" x-data="{tabProfile:'one'}">
        <div class="buttons-profile">
            <button :class="{'active-profile':tabProfile==='one'}" class="btn-account-user" @click="tabProfile='one'">
                اطلاعات حساب
            </button>
            <button :class="{'active-profile':tabProfile==='two'}" class="btn-password" @click="tabProfile='two'">
                گذرواژه
            </button>
        </div>
        <div class="w-100" x-show="tabProfile==='one'">
            <h3>اطلاعات حساب</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
            <form class="form-profile" wire:submit.prevent="editProfile">
                <div class="item">
                    <div class="label">
                        <label for="name">نام</label>
                    </div>
                    <input type="text" name="" id="name" wire:model.defer="user.name">
                </div>
                <div class="item">
                    <div class="label">
                        <label for="family">نام خانوادگی</label>
                    </div>
                    <input type="text" name="" id="family" wire:model.defer="user.family">
                </div>
                <div class="item">
                    <div class="label">
                        <label for="phone">شماره همراه</label>
                    </div>
                    <input type="text" name="" id="phone" wire:model.defer="user.phone">
                </div>
                <div class="item">
                    <div class="label">
                        <label for="email"> ایمیل</label>
                    </div>
                    <input type="text" name="" id="email" wire:model.defer="user.email">
                </div>
                <div class="item-upload">
                    <div class="label">
                        <label for="email">تصویر پروفایل</label>
                    </div>
                    <input class="inp-upload" type="file" name="" id="email" wire:model.defer="file">
                </div>
                {{--            <div class="item">--}}
                {{--                <div class="label">--}}
                {{--                    <label for="">تاریخ تولد</label>--}}
                {{--                </div>--}}
                {{--                <input type="text" name="" id="">--}}
                {{--            </div>--}}
                <button class="btn-submit">
                    <i class="icon-circle"></i>
                    ثبت اطلاعات
                </button>
            </form>
        </div>
        <div class="w-100" x-show="tabProfile==='two'">
            <h3 class="mt-3"> ایجاد و ویرایش گذرواژه</h3>
            <form class="form-profile" wire:submit.prevent="setPassword">
                <div class="item">
                    <div class="label">
                        <label for="password">گذرواژه جدید</label>
                    </div>
                    <input type="password" name="" id="password" wire:model.defer="newPassword.password">
                </div>
                <div class="item">
                    <div class="label">
                        <label for="password_confirmation">تکرار گذرواژه</label>
                    </div>
                    <input type="password" name="" id="password_confirmation"
                           wire:model.defer="newPassword.password_confirmation">
                </div>
                <button class="btn-submit">
                    <i class="icon-circle"></i>
                    ایجاد گذرواژه
                </button>
            </form>

        </div>


    </div>
</div>
@push('title' , 'پروفایل')
