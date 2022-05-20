{{--        add post--}}
<div class="col-md-5 col-lg-4 order-md-last">
    <div class="add_post row">
        <div class="post-img text-center">
            <div class="input__wrapper">
                <input name="file" type="file" name="file" id="input__file" class="input input__file" multiple>
                <label for="input__file" class="input__file-button text-center">
                    <img class="input__file-icon" src="{{asset('icons/img.ico')}}" alt="Выбрать файл" width="25">
                </label>
            </div>
        </div>
        <div class="post-description text-center">
            <label for="lastName" class="form-label">Назва</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
            <label for="lastName" class="form-label">Опис</label>
            <textarea class="form-control w-100" aria-label="With textarea"></textarea>
            <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                <button class="w-100 btn btn-dark btn-lg" type="submit">Додати</button>
            </div>
        </div>
    </div>
</div>
{{--        add post--}}
