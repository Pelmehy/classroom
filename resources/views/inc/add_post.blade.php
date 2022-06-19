{{--        add post--}}
<form action="{{route('addPost')}}" class="col-md-5 col-lg-4 order-md-last" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="add_post row">
        <div class="post-img text-center">
            <div class="input__wrapper">
                <input name="file" type="file" name="file" id="input__file" class="input input__file" multiple required>
                <label for="input__file" class="input__file-button text-center">
                    <img class="input__file-icon" src="{{asset('icons/img.ico')}}" alt="Выбрать файл" width="25">
                </label>
            </div>
        </div>
        <div class="post-description text-center">
            <label for="Name" class="form-label">Назва</label>
            <input type="text" class="form-control" name="name" id="Name" placeholder="" value="" required="">

            <label for="description" class="form-label">Опис</label>
            <textarea class="form-control w-100" name="description" id="description" aria-label="With textarea" required></textarea>

            <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                <button class="w-100 btn btn-dark btn-lg" type="submit">Додати</button>
            </div>
        </div>
    </div>
</form>
{{--        add post--}}
