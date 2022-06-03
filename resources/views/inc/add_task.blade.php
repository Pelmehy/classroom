<form action="{{route('addTask', $course_id)}}" class="col-md-5 col-lg-4 order-md-last" method="post" enctype="multipart/form-data">
@csrf
    <div class="add_post row">
        <div class="post-img text-center">
            <div class="input__wrapper">
                <input type="file" name="img" id="input__file" class="input input__file" multiple>
                <label for="input__file" class="input__file-button text-center">
                    <img class="input__file-icon" src="{{asset('icons/img.ico')}}" alt="Выбрать файл" width="25">
                </label>
            </div>
        </div>
        <div class="add_task post-description text-center">
            <label for="lastName" class="form-label">Дедлайн</label>
            <input type="date" class="form-control" name="date" placeholder="MM/DD/YYY" type="text"/>

            <label for="lastName" class="form-label">Назва</label>
            <input type="text" class="form-control" name="name" placeholder="" value="" required="">

            <label for="lastName" class="form-label">Опис</label>
            <textarea name="description" class="form-control" style="height: 150px" aria-label="With textarea"></textarea>

            <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                <button class="w-100 btn btn-dark btn-lg" type="submit">Додати</button>
            </div>
        </div>
    </div>
</form>
